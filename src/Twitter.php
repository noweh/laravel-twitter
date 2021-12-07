<?php

namespace Noweh\Twitter;

use Config;
use Noweh\TwitterApi\Client;

class Twitter
{
    /** @var Client $client */
    private $client;

    /**
     * Twitter constructor
     */
    public function __construct()
    {
        $this->client = new Client(Config::get('twitter'));
    }

    /**
     * Magic method that allows you to use Twitter Client Methods
     * @param String $method name of the accessor
     * @param array $args list of arguments
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        if (method_exists($this->client, $method)) {
            return $this->client->{$method}();
        }

        return $this;
    }
}
