<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 07.06.2018
 * Time: 17:06
 */

namespace Umbrella\StompBundle\Service\Adapter;

use Stomp\Client;
use Umbrella\StompBundle\Service\AdapterInterface;

/**
 * Class LiteAdapter
 *
 * @package Umbrella\StompBundle\Service\Adapter
 */
class LiteAdapter extends Client implements AdapterInterface
{
}