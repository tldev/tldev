<?php


namespace Application\Blog\Factory;


use Application\Blog\BlogInterface;

interface FactoryInterface {

    /**
     * @param $id
     * @return BlogInterface
     */
    public function get($id);

} 