<?php


namespace Application\Blog\Writer;


use Application\Blog\BlogInterface;
use Doctrine\Common\Persistence\ObjectManager as OM;

class ObjectManager implements WriterInterface {

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    protected $om;

    public function __construct(OM $em) {
        $this->om = $em;
    }

    /**
     * @param BlogInterface $blog
     */
    public function create(BlogInterface $blog)
    {
        $this->om->persist($blog);
        $this->om->flush($blog);
    }

    /**
     * @param BlogInterface $blog
     */
    public function save(BlogInterface $blog)
    {
        $this->om->flush($blog);
    }

    /**
     * @param BlogInterface $blog
     */
    public function delete(BlogInterface $blog)
    {
        $this->om->remove($blog);
        $this->om->flush($blog);
    }

}