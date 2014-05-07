<?php

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MarkdownController extends AbstractActionController {

    public function markdownToHtmlAction() {
        $markdown = $this->params()->fromPost('markdown');
        $parsedown = new \Parsedown();
        $markdown_html = $parsedown->text($markdown);

        $response = $this->getResponse();
        $response->setStatusCode(200);
        $response->setContent($markdown_html);
        return $response;
    }

} 