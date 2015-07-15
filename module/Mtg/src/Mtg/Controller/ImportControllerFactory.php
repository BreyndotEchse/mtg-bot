<?php
namespace Mtg\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ImportControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return ImportController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $rulesImporter = $serviceLocator->getServiceLocator()->get('Mtg\RulesImporter');
        $controller = new ImportController($rulesImporter);

        return $controller;
    }

}
