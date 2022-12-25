<?php
include_once '../vendor/autoload.php';

$fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
$eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

try {
    $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    exit($e->getMessage());
}

$tron->setAddress(readline('From address:'));
$tron->setPrivateKey(readline('From private key:'));
$amount = readline('Amount, trx:');

$to = readline('To address:');

try {
    $transfer = $tron->send($to, (float) $amount);
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    die($e->getMessage());
}

var_dump($transfer);