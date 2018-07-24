<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 07.06.2018
 * Time: 17:00
 */

namespace Umbrella\StompBundle\Service;


/**
 * Interface AdapterInterface
 *
 * @package Umbrella\StompBundle\Service
 */
interface AdapterInterface
{
	/**
	 * Stomp Version 1.0
	 */
	const PROTOCOL_VERSION_1_0 = '1.0';
	/**
	 * Stomp Version 1.1
	 */
	const PROTOCOL_VERSION_1_1 = '1.1';
	/**
	 * Stomp Version 1.2
	 */
	const PROTOCOL_VERSION_1_2 = '1.2';


	/**
	 * @return bool
	 */
	public function connect();


	/**
	 * @return bool
	 */
	public function isConnected();

	/**
	 * @param bool $sync
	 * @return bool
	 */
	public function disconnect($sync = false);

	/**
	 * @param string    $destination
	 * @param string    $msg
	 * @param array     $header
	 * @param bool|NULL $sync
	 * @return bool
	 */
	public function send($destination, $msg, array $header = [], $sync = null);

	/**
	 * @return string
	 */
	public function getSessionId();

	/**
	 * @return bool
	 */
	public function isSync();

	/**
	 * @param bool $sync
	 */
	public function setSync($sync);
}