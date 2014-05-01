<?php

namespace Application\View\Helper\Factory;


use Application\View\Helper\RandomExtension;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RandomExtensionFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Application\Service\UriMadnessInterface $uri_madness */
        $uri_madness = $serviceLocator->getServiceLocator()->get('Application\Service\UriMadness');

        return new RandomExtension($uri_madness);
    }
}