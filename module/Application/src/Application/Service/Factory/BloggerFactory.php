<?php


namespace Application\Service\Factory;


use Application\Blog\Blogger;
use Application\Blog\Factory\ObjectRepository;
use Application\Blog\Writer\ObjectManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class BloggerFactory implements FactoryInterface {

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
        $blog_writer = new ObjectManager($em);

        /** @var \Doctrine\ORM\EntityRepository $blog_repo */
        $blog_repo = $serviceLocator->get('blog-repo');
        $blog_factory = new ObjectRepository($blog_repo);

        return new Blogger($blog_writer, $blog_factory);
    }
}