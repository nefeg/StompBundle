<?php

namespace Aimchat\StompBundle;

/**
 * Interface MessageCacheInterface
 *
 * @package Aimchat\StompBundle
 */
interface MessageCacheInterface
{
	/**
	 * @return string
	 */
	public function getCacheKey() :string;
}