<?php
/**
 * @author Thomas Johnell <tjohnell@gmail.com>
 * @date   1/21/15
 */

namespace Application\Service\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ResumeDownload
 *
 * @package Application\Service\Factory
 */
class ResumeDownload implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed|void
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config           = $serviceLocator->get('Config');
        $default_filename = isset($config['resume']['default_filename']) ? $config['resume']['default_filename']
            : 'ThomasJohnellResume';
        /** @var \League\Flysystem\Filesystem $filesystem */
        $filesystem = $serviceLocator->get('ResumeFilesystem');

        return new \Application\Service\ResumeDownload($filesystem, $default_filename);
    }
}
