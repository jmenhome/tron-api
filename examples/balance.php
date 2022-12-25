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

$address = readline('Please type address:');

$tron->setAddress($address);
$balance = $tron->getBalance(null, true);
echo 'Balance #1: '.$balance."\n";

$balance = $tron->getBalance($address, true);
echo 'Balance #2: '.$balance."\n";