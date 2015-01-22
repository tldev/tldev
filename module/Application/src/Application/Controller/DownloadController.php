<?php
/**
 * @author Thomas Johnell <tjohnell@gmail.com>
 * @date   1/21/15
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class DownloadController
 *
 * @package Application\Controller
 */
class DownloadController extends AbstractActionController
{

    public function resumeAction()
    {
        /** @var \Application\Service\ResumeDownload $resume_download */
        $resume_download = $this->getServiceLocator()->get('Application\Service\ResumeDownload');
        $stream          = $resume_download->getStream($this->params()->fromRoute('ext'));

        if ($stream) {
            return $stream;
        }

        return $this->redirect()->toRoute('index');
    }
} 
