<?php

namespace StompBundle;

/**
 * Interface MessageInterface
 *
 * @package StompBundle
 */
interface MessageInterface
{
	const HEADER_PREFIX = 'x-app-';
	
	/**
	 * @return string
	 */
	public function getStompMessage() :string;


	/**
	 * @return array
	 */
	public function getStompHeaders() :array;
}