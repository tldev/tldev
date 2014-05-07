<?php

namespace Application\Controller;

use Application\Blog\BloggerInterface;
use Application\Blog\Exception\NotFound;
use Application\Entity\Blog;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BlogController extends AbstractActionController {

    /**
     * @var BloggerInterface
     */
    protected $blogger;

    public function __construct(BloggerInterface $blogger) {
        $this->blogger = $blogger;
    }

    public function indexAction() {
        return $this->redirect()->toRoute('index', array('uri' => ''));
    }

    public function addAction() {
        $request = $this->getRequest();

        /** @var \Application\Service\FormCreator $form_creator */
        $form_creator = $this->getServiceLocator()->get('Application\Service\FormCreator');

        $blog = new Blog();
        $form = $form_creator->getAddBlogForm();
        $form->bind($blog);

        if($request->isPost()) {
            $form->setData($request->getPost());

            if($form->isValid()) {
                $this->blogger->add($blog);
            }
        }

        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function deleteAction() {
        $request = $this->getRequest();

        $view_model = new ViewModel();
        $view_model->setTerminal(true);

        if($request->isPost()) {
            $id = (int)$this->params()->fromQuery('id');
        }

        return $view_model;
    }

    public function editAction() {
        $blog_id = (int)$this->params()->fromQuery('id');

        if(!$blog_id) {
            return $this->redirect('blog/add');
        }

        try {
            $blog = $this->blogger->find($blog_id);
        } catch(NotFound $e) {
            return $this->redirect('blog/add');
        }

        /** @var \Application\Service\FormCreator $form_creator */
        $form_creator = $this->getServiceLocator()->get('Application\Service\FormCreator');

        $form = $form_creator->getEditBlogForm();
        $form->bind($blog);

        $request = $this->getRequest();
        if($request->isPost()) {
            $form->setData($request->getPost());

            if($form->isValid()) {
                $this->blogger->update($blog);
                return $this->prg();
            }
        }

        return array(
            'form' => $form
        );
    }
} 