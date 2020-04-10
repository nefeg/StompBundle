<?php

namespace Aimchat\StompBundle;

/**
 * Interface ExchangePointInterface
 *
 * @package Aimchat\StompBundle\ExchangePoints
 */
interface ExchangePointInterface
{
	/**
	 * @see http://jmesnil.net/stomp-websocket/doc/
	 */
	
	// Valid destination types are: /temp-queue, /exchange, /topic, /queue, /amq/queue, /reply-queue/
	/*
		default Listing exchanges ...
			direct
		amq.direct	direct
		amq.fanout	fanout
		amq.headers	headers
		amq.match	headers
		amq.rabbitmq.log	topic
		amq.rabbitmq.trace	topic
		amq.topic	topic
		...done.

	full destination: '/getDestinationType/getDestinationPoint/getDestinationRoute
	 */


	/**
	 * Return full destination: '/getDestinationType/getDestinationPoint/getDestinationRoute
	 *
	 * example: '/exchange/amq.direct/uniq-key'
	 *
	 * @return string
	 */
	public function __toString() :string;


	/**
	 * Valid destination types are: /temp-queue, /exchange, /topic, /queue, /amq/queue, /reply-queue/
	 *
	 * @return string
	 */
	public function getDestinationType() :string;

	/**
	 * @return string
	 */
	public function getDestinationPath() :string;

	/**
	 * @return string
	 */
	public function getDestinationKey() :string;
}