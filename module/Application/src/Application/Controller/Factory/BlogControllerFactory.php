<?php


namespace Application\Controller\Factory;


use Application\Controller\BlogController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BlogControllerFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $blogger = $serviceLocator->getServiceLocator()->get('blogger');
        return new BlogController($blogger);
    }
}