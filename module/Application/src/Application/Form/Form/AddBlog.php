<?php

namespace Application\Form\Form;

use Application\Form\Fieldset\Blog;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Form;

class AddBlog extends Form {

    public function __construct(DoctrineObject $doctrine_object) {
        parent::__construct('b-form');

        $fieldset = new Blog();
        $fieldset->setUseAsBaseFieldset(true);
        $this->add($fieldset);
        $this->setHydrator($doctrine_object);

        $this->add(
            array(
                'type' => 'Zend\Form\Element\Csrf',
                'name' => 'csrf',
                'options' => array(
                    'csrf_options' => array(
                        'timeout' => 600
                    )
                )
            )
        );

        $this->add(
            array(
                'type' => 'submit',
                'name' => 'submit',
                'attributes' => array(
                    'value' => 'Submit',
                    'class' => 'btn'
                )
            )
        );
    }

} 