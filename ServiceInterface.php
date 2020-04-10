<?php

namespace Aimchat\StompBundle;


/**
 * Interface ServiceInterface
 *
 * @package Aimchat\StompBundle
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
	 * @param \Aimchat\StompBundle\ExchangePointInterface $exchangePoint
	 * @param \Aimchat\StompBundle\MessageInterface       $StompMessage
	 * @param bool                                    $sync
	 * @param bool                                    $cache
	 * @return bool
	 */
	public function sendToPoint(ExchangePointInterface $exchangePoint, MessageInterface $StompMessage, bool $sync = false, bool $cache = false) :bool;
}