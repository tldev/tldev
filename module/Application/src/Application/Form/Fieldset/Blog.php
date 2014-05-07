<?php

namespace Application\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class Blog extends Fieldset implements InputFilterProviderInterface{

    public function __construct() {
        parent::__construct('b-field');

        $this->add(
            array(
                'type' => 'textarea',
                'name' => 'content',
                'attributes' => array(
                    'class' => 'markdown-writer'
                )
            )
        );
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'content' => array(
                'required' => true
            )
        );
    }
}