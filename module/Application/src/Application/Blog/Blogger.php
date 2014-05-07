<?php


namespace Application\Blog;


use Application\Blog\Factory\FactoryInterface;
use Application\Blog\Writer\WriterInterface;
use Application\Blog\Exception\NotFound;

class Blogger implements BloggerInterface {

    /**
     * @var WriterInterface
     */
    protected $writer;

    /**
     * @var FactoryInterface
     */
    protected $factory;

    /**
     * @param WriterInterface $writer
     * @param FactoryInterface $factory
     */
    public function __construct(WriterInterface $writer, FactoryInterface $factory) {
        $this->writer = $writer;
        $this->factory = $factory;
    }

    /**
     * @param BlogInterface $blog
     * @return mixed
     */
    public function add(BlogInterface $blog)
    {
        $this->writer->create($blog);
    }

    /**
     * @param $id
     * @return BlogInterface
     * @throws Exception\NotFound
     */
    public function find($id) {
        $blog = $this->factory->get($id);
        if(!$blog instanceof BlogInterface) {
            throw new NotFound(sprintf('Blog with id %s was not found'));
        }

        return $blog;
    }

    /**
     * @param BlogInterface $blog
     */
    public function update(BlogInterface $blog) {
        $this->writer->save($blog);
    }
}