<?php

namespace Aimchat\StompBundle\ExchangePoint;

/**
 * Class PrivatePointFactory
 *
 * @package Aimchat\StompBundle\ExchangePoint
 */
class PrivatePointFactory
{
	/**
	 * @param $key
	 * @return mixed
	 */
	static public function factory($key) {

		return new class($key) extends PrivateDirectPoint {

			public function __construct($key) {
				$this->setDestinationPointKey($key);
			}
		};
	}
}