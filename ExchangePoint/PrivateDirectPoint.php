<?php

namespace Aimchat\StompBundle\ExchangePoint;

use Aimchat\StompBundle\ExchangePointInterface;

/**
 * Class PrivateDirectPoint
 *
 * @package Aimchat\StompBundle\ExchangePoint
 */
abstract class PrivateDirectPoint implements ExchangePointInterface
{
	const DESTINATION_TYPE = 'exchange';
	const DESTINATION_PATH = 'amq.direct';

	/**
	 * @var string
	 */
	protected $key;

	/**
	 * Return full destination: '/getDestinationType/getDestinationPoint/getDestinationRoute
	 *
	 * example: '/exchange/amq.direct/uniq-key'
	 *
	 * @return string
	 */
	public function __toString() :string {

		return '/'.
			$this->getDestinationType() . '/' .
			$this->getDestinationPath() . '/' .
			$this->getDestinationKey()
			;
	}


	/**
	 * Valid destination types are: /temp-queue, /exchange, /topic, /queue, /amq/queue, /reply-queue/
	 *
	 * @return string
	 */
	public function getDestinationType() :string {

		return static::DESTINATION_TYPE;
	}

	/**
	 * @return string
	 */
	public function getDestinationPath() :string {

		return static::DESTINATION_PATH;
	}

	/**
	 * @return string
	 */
	public function getDestinationKey() :string {

		return $this->key;
	}

	/**
	 * @param string $key
	 * @return PrivateDirectPoint
	 */
	public function setDestinationPointKey($key) {

		$this->key = $key;

		return $this;
	}
}