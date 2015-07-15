<?php
namespace Mtg\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RuleControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RuleController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $objectManager = $serviceLocator->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $repository = $objectManager->getRepository('Mtg\Model\Rule');
        $controller = new RuleController($repository);

        return $controller;
    }

}
