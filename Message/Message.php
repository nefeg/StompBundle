<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 29.03.16
 * Time: 21:46
 */

namespace Umbrella\StompBundle\Message;

/**
 * Class Message
 *
 * @package Umbrella\StompBundle\Message
 */
class Message extends AbstractMessage
{
	/**
	 * Message constructor.
	 *
	 * @param string         $message
	 * @param array          $headers
	 */
	public function __construct(string $message = '', array $headers = []){
		
		$this->setStompMessage($message);
		$this->setStompHeaders($headers);
	}
}