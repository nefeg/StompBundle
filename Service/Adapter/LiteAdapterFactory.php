<?php


namespace Aimchat\StompBundle\Service\Adapter;

use Aimchat\StompBundle\Service\AdapterInterface;
use Aimchat\StompBundle\Service\ServiceException;
use Stomp\Exception\StompException;

/**
 * Class LiteAdapterFactory
 *
 * @package Aimchat\StompBundle\Service\Adapter
 */
class LiteAdapterFactory
{
	/**
	 * @param string $host
	 * @param string $login
	 * @param string $password
	 * @param array  $versions
	 * @param string $vhost
	 * @return AdapterInterface
	 * @throws ServiceException
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