<?php

namespace Application\View\Helper;

use Application\Service\UriMadnessInterface;
use Zend\View\Helper\AbstractHelper;

class RandomExtension extends AbstractHelper {

    protected $uri_madness;

    public function __construct(UriMadnessInterface $uri_madness) {
        $this->uri_madness = $uri_madness;
    }

    public function __invoke() {
        return $this->uri_madness->getRandomExtension();
    }
} 