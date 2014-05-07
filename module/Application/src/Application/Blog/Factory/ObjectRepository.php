<?php


namespace Application\Blog\Factory;


use Application\Blog\BlogInterface;
use Doctrine\Common\Persistence\ObjectRepository as ObjectRepo;

class ObjectRepository implements FactoryInterface{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    protected $or;

    public function __construct(ObjectRepo $or) {
        $this->or = $or;
    }

    /**
     * @param $id
     * @throws \Application\Blog\Exception\NotFound
     * @return BlogInterface
     */
    public function get($id)
    {
        return $this->or->find($id);
    }
}