<?php
/**
 * @author Thomas Johnell <tjohnell@gmail.com>
 * @date   1/31/15
 */

namespace Application\Service\Factory;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Cache\Adapter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class LocalFilesystemCache
 *
 * @package Application\Service\Factory
 */
class LocalFilesystemCache implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @throws \Exception
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['local_filesystem_cache']['path'])) {
            throw new \Exception('local filesystem cache path not defined');
        }
        $path = $config['local_filesystem_cache']['path'];

        if(!is_dir($path))
        {
            mkdir($path);
        }
        $local = new Local($path);
        $cache = new Adapter($local, 'file', 30000);

        return $cache;
    }
}
