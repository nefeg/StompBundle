<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 07.06.2018
 * Time: 17:46
 */

namespace Umbrella\StompBundle\Service\Adapter;

use Stomp\Exception\StompException;
use Umbrella\StompBundle\Service\AdapterInterface;
use Umbrella\StompBundle\Service\ServiceException;

/**
 * Class LiteAdapterFactory
 *
 * @package Umbrella\StompBundle\Service\Adapter
 */
class LiteAdapterFactory
{
	/**
	 * @param string $host
	 * @param string $login
	 * @param string $password
	 * @param array  $versions
	 * @param string $vhost
	 * @return \Umbrella\StompBundle\Service\AdapterInterface
	 * @throws \Umbrella\StompBundle\Service\ServiceException
	 */
	static public function factory(
		string  $host,
		string  $login,
		string  $password,
		array   $versions = [AdapterInterface::PROTOCOL_VERSION_1_0, AdapterInterface::PROTOCOL_VERSION_1_0],
		string  $vhost = '/'

	) :AdapterInterface
	{

		$Adapter = new LiteAdapter($host);
		$Adapter->setLogin($login, $password);
		$Adapter->setVersions($versions);
		$Adapter->setVhostname($vhost);

		try{
			$Adapter->connect();

		}catch (StompException $e){

			throw new ServiceException("ServiceFactory can't create stomp client: ". $e->getMessage(), null, $e);
		}

		return $Adapter;
	}
}