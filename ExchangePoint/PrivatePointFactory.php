<?php

namespace StompBundle\ExchangePoint;

/**
 * Class PrivatePointFactory
 *
 * @package StompBundle\ExchangePoint
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