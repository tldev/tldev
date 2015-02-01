<?php
/**
 * @author Thomas Johnell <tjohnell@gmail.com>
 * @date   1/21/15
 */

namespace Application\Service\Factory;

use League\Flysystem\Adapter\Dropbox;
use League\Flysystem\Filesystem;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ResumeFilesystem
 *
 * @package Application\Service\Factory
 */
class ResumeFilesystem implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed|void
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config        = $serviceLocator->get('Config');
        $resume_folder = isset($config['resume']['default_folder']) ? $config['resume']['default_folder'] : null;
        /** @var \Dropbox\Client $dropbox_client */
        $dropbox_client = $serviceLocator->get('DropboxClient');
        /** @var \League\Flysystem\Cache\Adapter $cache */
        $cache      = $serviceLocator->get('LocalFilesystemCache');
        $filesystem = new Filesystem(new Dropbox($dropbox_client, $resume_folder), $cache);

        return $filesystem;
    }
}
