<?php

require __DIR__ . '/../vendor/autoload.php';

use Nsq\Request;
use Nsq\Topic;

define('TEST_TOPIC', 'test');

$request = new Request('127.0.0.1', 4151);

$topic = new Topic($request);

// create a new topic
$topic->create(TEST_TOPIC);

// pause message flow for a topic
$topic->pause(TEST_TOPIC);

// unpause message flow for a topic
$topic->unpause(TEST_TOPIC);

// empty a topic
$topic->empty(TEST_TOPIC);

// delete a topic
$topic->delete(TEST_TOPIC);
