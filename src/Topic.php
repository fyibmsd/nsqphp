<?php

namespace Nsq;

/**
 * @method Topic create(string $topic)
 * @method Topic delete(string $topic)
 * @method Topic empty(string $topic)
 * @method Topic pause(string $topic)
 * @method Topic unpause(string $topic)
 */
class Topic
{
    public $request;


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function __call($opt, $args)
    {
        $response = $this->request->post(sprintf('topic/%s', $opt), ['topic' => $args[0]]);

        return $response->getStatusCode() === 200;
    }
}
