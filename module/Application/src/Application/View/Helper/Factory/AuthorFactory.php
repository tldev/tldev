<?php

namespace Application\View\Helper\Factory;


use Application\View\Helper\Author;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthorFactory implements FactoryInterface {

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @throws \Exception
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->getServiceLocator()->get('Config');
        if(!isset($config['author'])) {
            throw new \Exception('Author must be defined in config in order to use author viewhelper!');
        }

        return new Author($config['author']);
    }
}