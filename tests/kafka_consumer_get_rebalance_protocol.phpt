--TEST--
KafkaConsumer::getRebalanceProtocol() returns "NONE" before group join
--SKIPIF--
<?php
if (!method_exists('RdKafka\KafkaConsumer', 'getRebalanceProtocol')) {
    die('skip getRebalanceProtocol() not available in this librdkafka build');
}
--FILE--
<?php

$conf = new RdKafka\Conf();
$conf->set('group.id', 'test-rebalance-protocol');
$conf->setLogCb(function () {});

$consumer = new RdKafka\KafkaConsumer($conf);

$protocol = $consumer->getRebalanceProtocol();

var_dump($protocol);
--EXPECT--
string(4) "NONE"
