<?php
/**
 * @author Thomas Johnell <tjohnell@gmail.com>
 * @date   1/21/15
 */

namespace Application\Service\Factory;

use Dropbox\AuthInfo;
use Dropbox\Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DropboxClient
 *
 * @package Application\Service\Factory
 */
class DropboxClient implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @throws \Exception
     * @return mixed|void
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (!isset($config['dropbox']['access_token']) || !file_exists($config['dropbox']['access_token'])) {
            throw new \Exception('Access token invalid');
        }

        $client_identifier = isset($config['drobox']['client_identifier']) ? : 'tldev';
        $auth_info         = AuthInfo::loadFromJsonFile($config['dropbox']['access_token']);
        $client            = new Client($auth_info[0], $client_identifier);

        return $client;
    }
}
