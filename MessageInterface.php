<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 29.03.16
 * Time: 21:46
 */

namespace Umbrella\StompBundle;

/**
 * Interface MessageInterface
 *
 * @package Umbrella\StompBundle
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