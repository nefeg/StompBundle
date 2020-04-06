<?php

namespace StompBundle;


/**
 * Interface ServiceInterface
 *
 * @package StompBundle
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
	 * @param \StompBundle\ExchangePointInterface $exchangePoint
	 * @param \StompBundle\MessageInterface       $StompMessage
	 * @param bool                                    $sync
	 * @param bool                                    $cache
	 * @return bool
	 */
	public function sendToPoint(ExchangePointInterface $exchangePoint, MessageInterface $StompMessage, bool $sync = false, bool $cache = false) :bool;
}