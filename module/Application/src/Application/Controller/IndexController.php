<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return array();
    }

    public function aboutAction()
    {
        $date     = new \DateTime('2011-06-26'); //When I started at booj
        $interval = $date->diff(new \DateTime());

        return new ViewModel(
            array(
                'years' => $interval->format('%y')
            )
        );
    }

    public function lazyAction()
    {
        return new ViewModel();
    }

    public function markersAction()
    {
        return array();
    }

    public function contactAction()
    {
        return array();
    }

    public function resumeAction()
    {
        return array();
    }
}
