<?php


namespace Application\Blog;


interface BlogInterface {

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return \DateTime
     */
    public function getCreated();

} 