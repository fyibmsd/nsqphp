<?php

namespace Nsq;

/**
 * @method Channel create(string $channel)
 * @method Channel delete(string $channel)
 * @method Channel empty(string $channel)
 * @method Channel pause(string $channel)
 * @method Channel unpause(string $channel)
 */
class Channel
{
    public $request;

    private $options = [];

    public function __construct(Request $request, array $options)
    {
        $this->request = $request;
        $this->options = $options;
    }

    public function __call($opt, $args)
    {
        $response = $this->request->post(sprintf('channel/%s', $opt), ['topic' => $this->options['topic'], 'channel' => $args[0]]);

        return $response->getStatusCode() === 200;
    }
}
