<?php


namespace Application\Repository\Factory;


use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AbstractRepositoryFactory implements AbstractFactoryInterface {

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        if(strstr($requestedName, '-repo') !== false) {
            $config = $serviceLocator->get('Config');
            return isset($config['doctrine']['repositories'][$requestedName]);
        } else {
            return false;
        }
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $config = $serviceLocator->get('Config');
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $serviceLocator->get('Doctrine\ORM\EntityManager');
        return $em->getRepository($config['doctrine']['repositories'][$requestedName]);
    }
}