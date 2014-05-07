<?php

namespace Application\Service\Factory;


use Application\Service\FormCreator;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class FormCreatorFactory implements FactoryInterface{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Doctrine\ORM\EntityManager $em */
        $em = $serviceLocator->get('Doctrine\ORM\EntityManager');
        return new FormCreator($em);
    }
}