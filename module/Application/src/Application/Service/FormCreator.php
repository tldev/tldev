<?php
namespace Application\Service;

use Application\Form\Form\AddBlog;
use Doctrine\ORM\EntityManagerInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

class FormCreator {

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    protected $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function getAddBlogForm() {
        return new AddBlog($this->getHydrator());
    }

    public function getEditBlogForm() {
        return new AddBlog($this->getHydrator());
    }

    protected function getHydrator() {
        return new DoctrineObject($this->em, false);
    }
} 