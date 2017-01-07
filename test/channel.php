<?php

require __DIR__ . '/../vendor/autoload.php';

use Nsq\Channel;
use Nsq\Request;

define('TEST_TOPIC', 'test');
define('TEST_CHANNEL', 'just_channel');

$request = new Request('127.0.0.1', 4151);

$channel = new Channel($request, ['topic' => TEST_TOPIC]);

// create a new channel
$channel->create(TEST_CHANNEL);

// pause message flow for a channel
$channel->pause(TEST_CHANNEL);

// unpause message flow for a channel
$channel->unpause(TEST_CHANNEL);

// empty a channel
$channel->empty(TEST_CHANNEL);

// delete a channel
$channel->delete(TEST_CHANNEL);
