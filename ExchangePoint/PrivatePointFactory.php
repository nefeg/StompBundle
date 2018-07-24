<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 08.06.2018
 * Time: 1:25
 */

namespace Umbrella\StompBundle\ExchangePoint;

/**
 * Class PrivatePointFactory
 *
 * @package Umbrella\StompBundle\ExchangePoint
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