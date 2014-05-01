<?php

namespace Application\View\Helper;


use Zend\View\Helper\AbstractHelper;

class Author extends AbstractHelper {

    private $author;

    public function __construct($author) {
        $this->author = $author;
    }

    public function __invoke() {
        return $this->author;
    }

} 