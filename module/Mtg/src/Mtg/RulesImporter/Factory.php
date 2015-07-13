<?php
namespace Mtg\RulesImporter;

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
        $objectManager = $serviceLocator->get('doctrine.entitymanager.orm_default');
        $service = new RulesImporter($objectManager);

        $config = $serviceLocator->get('config');
        if (!empty($config['rulesections'])) {
            $service->setSections($config['rulesections']);
        }
        return $service;
    }

}
