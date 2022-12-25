<?php

include_once '../vendor/autoload.php';

use IEXBase\TronAPI\Tron;


try {
    $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
    $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
    $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
    $explorer = new \IEXBase\TronAPI\Provider\HttpProvider('https://tronscan.org');
} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    echo $e->getMessage();
}

$address = readline('Address:');

try {
    $tron = new Tron($fullNode, $solidityNode, $eventServer, null, $explorer);
    $contract = $tron->contract('TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t');  // Tether USDT https://tronscan.org/#/token20/TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t

    // Data
    echo 'Name: '.$contract->name()."\n";
    echo 'Symbol: '.$contract->symbol()."\n";
    echo sprintf('Balance of address %s: ', $address).$contract->balanceOf($address)."\n";
    echo 'Total supply: '.$contract->totalSupply()."\n";
    //echo  $contract->transfer('to', 'amount', 'from');


} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    echo $e->getMessage();
}