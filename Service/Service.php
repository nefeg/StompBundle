<?php

namespace StompBundle\Service;

use StompBundle\ExchangePointInterface;
use StompBundle\MessageCacheInterface;
use StompBundle\MessageInterface;
use StompBundle\ServiceInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Service
 *
 * @package StompBundle
 */
class Service implements ServiceInterface
{
	static $dump;

	private static $cache = [];

	/**
	 * @var \StompBundle\Service\AdapterInterface
	 */
	private $Adapter;
	/**
	 * @var null|\Psr\Log\LoggerInterface
	 */
	private $Logger;

	/**
	 * Service constructor.
	 *
	 * @param \StompBundle\Service\AdapterInterface $Adapter
	 * @param \Psr\Log\LoggerInterface|null             $Logger
	 */
	public function __construct(AdapterInterface $Adapter, LoggerInterface $Logger = null){

		$this->Adapter  = $Adapter;
		$this->Logger   = $Logger ?? new LoggerStub();
	}

	/**
	 * @return AdapterInterface
	 */
	protected function getAdapter() :AdapterInterface{
		return $this->Adapter;
	}

	/**
	 * Service destructor.
	 */
	public function __destruct() {

		$this->getAdapter()->disconnect();
	}

	/**
	 * @return bool
	 */
	public function __reconnect() :bool{

		try{
			$this->getAdapter()->disconnect();
		}catch(\Exception $Exception){
			// to do nothing
		}finally{
			$this->getAdapter()->connect();
		}

		return $this->getAdapter()->isConnected();
	}


	/**
	 * @param        $destination
	 * @param string $msg
	 * @param array  $header
	 * @param bool   $sync
	 * @return bool
	 */
	public function send( string $destination, string $msg, array $header = [], bool $sync = false) :bool{

		$header['server-time']      = (new \DateTime('now', new \DateTimeZone('UTC')))->format('U'); // UTC timestamp

		self::$dump = [$destination, $msg, $header, $sync];

		$this->Logger->info("**StompBundle\Service** send[$destination]: $msg");

		return $this->Adapter->send($destination, $msg, $header, $sync);
	}


	/**
	 * @param \StompBundle\ExchangePointInterface $exchangePoint
	 * @param MessageInterface       $StompMessage
	 * @param bool                                    $sync
	 * @param bool                                    $cache
	 * @return bool
	 */
	public function sendToPoint(ExchangePointInterface $exchangePoint, MessageInterface $StompMessage, bool $sync = false, bool $cache = false) :bool{

		if ($cache && $StompMessage instanceof MessageCacheInterface){

			if (!isset( self::$cache[$StompMessage->getCacheKey()] ))
				self::$cache[$StompMessage->getCacheKey()] = [$StompMessage->getStompHeaders(), $StompMessage->getStompMessage()];


			list($stompHeader, $stompMessage) = self::$cache[$StompMessage->getCacheKey()];

		}else{
			$stompHeader    = $StompMessage->getStompHeaders();
			$stompMessage   = $StompMessage->getStompMessage();
		}

		return $this->send(
			$exchangePoint,
			$stompMessage,
			$stompHeader,
			$sync
		);
	}
}