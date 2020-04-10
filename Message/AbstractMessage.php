<?php

namespace Aimchat\StompBundle\Message;

use Aimchat\StompBundle\MessageCacheInterface;
use Aimchat\StompBundle\MessageInterface;

/**
 * Class AbstractMessage
 *
 * @package Aimchat\StompBundle
 */
abstract class AbstractMessage implements MessageInterface, MessageCacheInterface
{
	private $cacheKey = null;

	/**
	 * @var string
	 */
	private $message = '';

	/**
	 * @var array
	 */
	private $headers = [];

	/**
	 * @return string
	 */
	public function getCacheKey(): string {

		if (!$this->cacheKey)
			$this->cacheKey = uniqid(spl_object_hash($this) .'-', true);

		return $this->cacheKey;
	}


	/**
	 * @return string
	 */
	public function getStompMessage() :string {
		return $this->message;
	}


	/**
	 * @param string $message
	 * @return MessageInterface
	 */
	public function setStompMessage(string $message) :MessageInterface{
		$this->message = $message;

		return $this;
	}


	/**
	 * @return array
	 */
	public function getStompHeaders() :array{
		return $this->headers;
	}

	/**
	 * @param        $headerKey
	 * @param        $headerValue
	 * @param bool   $override
	 * @param string $preffix
	 * @return MessageInterface
	 * @throws MessageException
	 */
	public function addStompHeader($headerKey, $headerValue, $override = false, $preffix = MessageInterface::HEADER_PREFIX) :MessageInterface{

		$headerKey = $preffix.$headerKey;

		if (!isset($this->headers[$headerKey]) || $override)
			$this->headers[$headerKey] = $headerValue;
			
		else
			throw new MessageException("Header [$headerKey] is already exist");

		return $this;
	}

	/**
	 * @param $headerKey
	 * @return bool
	 */
	public function hasStompHeader($headerKey) :bool{
		
		return isset($this->headers[$headerKey]);
	}

	/**
	 * @param array $headers
	 * @return MessageInterface
	 */
	public function setStompHeaders(array $headers) :MessageInterface{
		$this->headers = $headers;

		return $this;
	}
}