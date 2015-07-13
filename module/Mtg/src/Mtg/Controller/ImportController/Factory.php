<?php
namespace Mtg\Controller\ImportController;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Factory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return RulesImporter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        echo get_class($serviceLocator);die;
        $rulesImporter = $serviceLocator->getServiceLocator()->get('Mtg\RulesImporter');
        $controller = new \Mtg\Controller\ImportController($rulesImporter);

        return $controller;
    }

}
