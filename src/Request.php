<?php

namespace Nsq;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Nsq\Exception\TopicException;

class Request
{
    public $client = null;

    public $api;

    public function __construct($host = '127.0.0.1', $port = 4151, array $config = [])
    {
        $this->client = new Client($config);
        $this->api = sprintf('%s:%s', $host, $port);
    }

    /**
     * @param $uri
     * @param array $params
     * @throws TopicException
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get($uri, array $params = [])
    {
        try {
            return $this->client->get(sprintf('%s/%s', $this->api, $uri), ['query' => $params]);
        } catch (ClientException $exception) {
            $content = json_decode($exception->getResponse()->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

            throw new TopicException($content['message']);
        }
    }

    /**
     * @param $uri
     * @param array $params
     * @throws TopicException
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post($uri, array $params = [])
    {
        try {
            return $this->client->post(sprintf('%s/%s', $this->api, $uri), ['query' => $params]);
        } catch (ClientException $exception) {
            $content = json_decode($exception->getResponse()->getBody()->getContents(), JSON_OBJECT_AS_ARRAY);

            throw new TopicException($content['message']);
        }
    }
}
