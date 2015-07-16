<?php
namespace Mtg\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GlossaryControllerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return GlossaryController
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $objectManager = $serviceLocator->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        $repository = $objectManager->getRepository('Mtg\Model\GlossaryEntry');
        $controller = new GlossaryController($repository);

        return $controller;
    }

}
