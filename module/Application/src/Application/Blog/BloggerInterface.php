<?php


namespace Application\Blog;


interface BloggerInterface {

    /**
     * @param BlogInterface $blog
     */
    public function add(BlogInterface $blog);

    /**
     * @param BlogInterface $blog
     */
    public function update(BlogInterface $blog);

    /**
     * @param int $id
     * @return BlogInterface
     */
    public function find($id);

}