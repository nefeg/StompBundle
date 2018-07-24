<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 31.03.16
 * Time: 21:28
 */

namespace Umbrella\StompBundle;


/**
 * Interface ServiceInterface
 *
 * @package Umbrella\StompBundle
 */
interface ServiceInterface
{
	/**
	 * @param        $destination
	 * @param string $msg
	 * @param array  $header
	 * @param bool   $sync
	 * @return bool
	 */
	public function send( string $destination, string $msg, array $header = [], bool $sync = false) :bool;


	/**
	 * @param \Umbrella\StompBundle\ExchangePointInterface $exchangePoint
	 * @param \Umbrella\StompBundle\MessageInterface       $StompMessage
	 * @param bool                                    $sync
	 * @param bool                                    $cache
	 * @return bool
	 */
	public function sendToPoint(ExchangePointInterface $exchangePoint, MessageInterface $StompMessage, bool $sync = false, bool $cache = false) :bool;
}