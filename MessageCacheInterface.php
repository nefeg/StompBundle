<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 25.04.17
 * Time: 19:28
 */

namespace Umbrella\StompBundle;

/**
 * Interface MessageCacheInterface
 *
 * @package Umbrella\StompBundle
 */
interface MessageCacheInterface
{
	/**
	 * @return string
	 */
	public function getCacheKey() :string;
}