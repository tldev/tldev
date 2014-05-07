<?php

namespace Application\Blog\Writer;


use Application\Blog\BlogInterface;

interface WriterInterface {

    /**
     * @param BlogInterface $blog
     * @return void
     */
    public function create(BlogInterface $blog);

    /**
     * @param BlogInterface $blog
     * @return void
     */
    public function save(BlogInterface $blog);

    /**
     * @param BlogInterface $blog
     * @return void
     */
    public function delete(BlogInterface $blog);

} 