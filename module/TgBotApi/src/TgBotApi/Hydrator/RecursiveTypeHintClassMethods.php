<?php
namespace TgBotApi\Hydrator;

use Zend\Stdlib\Hydrator\ClassMethods;

class RecursiveTypeHintClassMethods extends ClassMethods
{
    /**
     * @var \Doctrine\Common\Annotations\AnnotationReader
     */
    protected $annotationReader;

    public function __construct($underscoreSeparatedKeys = true)
    {
        $this->annotationReader = new \Doctrine\Common\Annotations\AnnotationReader;
        parent::__construct($underscoreSeparatedKeys);
    }

    public function hydrate(array $data, $object)
    {
        if (!is_object($object)) {
            throw new Exception\BadMethodCallException(sprintf(
                '%s expects the provided $object to be a PHP object)',
                __METHOD__
            ));
        }

        $objectClass = get_class($object);

        foreach ($data as $property => $value) {
            $propertyFqn = $objectClass . '::$' . $property;

            if (! isset($this->hydrationMethodsCache[$propertyFqn])) {
                $setterName = 'set' . ucfirst($this->hydrateName($property, $data));

                $this->hydrationMethodsCache[$propertyFqn] = is_callable(array($object, $setterName))
                    ? new \ReflectionMethod($objectClass, $setterName)
                    : false;
            }

            if ($this->hydrationMethodsCache[$propertyFqn]) {
                $parameters = $this->hydrationMethodsCache[$propertyFqn]->getParameters();
                /* @var $parameter \ReflectionParameter */
                $parameter = current($parameters);
                $reflectionClass = $parameter->getClass();
                $annotations = $this->annotationReader->getMethodAnnotations($this->hydrationMethodsCache[$propertyFqn]);
                if (!$annotations && $reflectionClass && $reflectionClass->isInterface()) {
                    throw new \Exception(':' . __LINE__);
                }

                $newReflectionClassName = null;
                foreach ($annotations as $annotation) {
                    if ($annotation instanceof \TgBotApi\Model\Annotation\InterfaceDiscriminationMapperInterface && $annotation->getParam() === $property) {
                        $newReflectionClassName = $annotation->getClass($value);
                        $reflectionClass = new \ReflectionClass($newReflectionClassName);
                    }
                    if ($annotation instanceof \TgBotApi\Model\Annotation\ValueFilterInterface) {
                        $value = $annotation->filter($value);
                    }
                }

                if (!$newReflectionClassName && $reflectionClass && $reflectionClass->isInterface()) {
                    throw new \Exception(':' . __LINE__);
                }

                if (!$reflectionClass) {
                    $preparedValue = $value;
                } else {
                    $reflectionClassConstructor = $reflectionClass->getConstructor();
                    $reflectionConstructorParameters = [];
                    if ($reflectionClassConstructor) {
                        $reflectionConstructorParameters = $reflectionClass->getConstructor()->getParameters();
                    }

                    if (is_array($value)) {
                        $constructorParams = [];
                        if ($reflectionConstructorParameters) {
                            /* @var $reflectionConstructorParameter \ReflectionParameter */
                            foreach ($reflectionConstructorParameters as $reflectionConstructorParameter) {
                                $paramName = $reflectionConstructorParameter->getName();
                                if (array_key_exists($paramName, $value)) {
                                    $constructorParams[$paramName] = $value[$paramName];
                                } elseif (array_key_exists($this->extractName($reflectionConstructorParameter->getName()), $value)) {
                                    $constructorParams[$paramName] = $value[$this->extractName($reflectionConstructorParameter->getName())];
                                } elseif ($reflectionConstructorParameter->isOptional()) {
                                    $constructorParams[$paramName] = $reflectionConstructorParameter->getDefaultValue();
                                } else {
                                    throw new \Exception(':' . __LINE__);
                                }
                            }
                        }
                        $valueObject = $reflectionClass->newInstanceArgs($constructorParams);
                        $preparedValue = $this->hydrate($value, $valueObject);
                    } else {
                        if ($reflectionClass->implementsInterface(__NAMESPACE__ . '\SingleValueHydratableInterface')) {
                            $preparedValue = $reflectionClass->newInstanceWithoutConstructor();
                            $preparedValue->setSingleValue($value);
                        } elseif (1 === count($reflectionConstructorParameters)) {
                            $preparedValue = $reflectionClass->newInstance($value);
                        } elseif ($reflectionConstructorParameters) {
                            $i = 0;
                            /* @var $reflectionConstructorParameter \ReflectionParameter */
                            foreach ($reflectionConstructorParameters as $reflectionConstructorParameter) {
                                if ($i++ === 0) {
                                    continue;
                                }
                                if (!$reflectionConstructorParameter->isOptional()) {
                                    throw new \Exception(':' . __LINE__);
                                }
                            }
                            $preparedValue = $reflectionClass->newInstance($value);
                        } else {
                            throw new \Exception(':' . __LINE__);
                        }
                    }
                }
                $this->hydrationMethodsCache[$propertyFqn]->invoke($object, $this->hydrateValue($property, $preparedValue, $data));
            }
        }

        return $object;
    }

    public function extract($object)
    {
        if (!is_object($object)) {
            throw new Exception\BadMethodCallException(sprintf(
                '%s expects the provided $object to be a PHP object)',
                __METHOD__
            ));
        }

        $objectClass = get_class($object);

        // reset the hydrator's hydrator's cache for this object, as the filter may be per-instance
        if ($object instanceof FilterProviderInterface) {
            $this->extractionMethodsCache[$objectClass] = null;
        }

        // pass 1 - finding out which properties can be extracted, with which methods (populate hydration cache)
        if (! isset($this->extractionMethodsCache[$objectClass])) {
            $this->extractionMethodsCache[$objectClass] = array();
            $filter                                     = $this->filterComposite;
            $methods                                    = get_class_methods($object);

            if ($object instanceof FilterProviderInterface) {
                $filter = new FilterComposite(
                    array($object->getFilter()),
                    array(new MethodMatchFilter('getFilter'))
                );
            }

            foreach ($methods as $method) {
                $methodFqn = $objectClass . '::' . $method;

                if (! ($filter->filter($methodFqn) && $this->callableMethodFilter->filter($methodFqn))) {
                    continue;
                }

                $attribute = $method;

                if (strpos($method, 'get') === 0) {
                    $attribute = substr($method, 3);
                    if (!property_exists($object, $attribute)) {
                        $attribute = lcfirst($attribute);
                    }
                }

                $this->extractionMethodsCache[$objectClass][$method] = $attribute;
            }
        }

        $values = array();

        // pass 2 - actually extract data
        foreach ($this->extractionMethodsCache[$objectClass] as $methodName => $attributeName) {
            $realAttributeName = $this->extractName($attributeName, $object);
            $extractedValue = $this->extractValue($realAttributeName, $object->$methodName(), $object);
            if (is_object($extractedValue)) {
                $extractedValue = $this->extract($extractedValue);
            }
            $values[$realAttributeName] = $extractedValue;
        }

        return $values;
    }


}