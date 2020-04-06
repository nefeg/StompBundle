<?php

namespace StompBundle;

/**
 * Interface MessageCacheInterface
 *
 * @package StompBundle
 */
interface MessageCacheInterface
{
	/**
	 * @return string
	 */
	public function getCacheKey() :string;
}