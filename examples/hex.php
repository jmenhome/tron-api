<?php
include_once '../vendor/autoload.php';

$tron = new \IEXBase\TronAPI\Tron();

echo $tron->toHex(readline('Address to Hex:'))."\n";
//result: 41BBC8C05F1B09839E72DB044A6AA57E2A5D414A10

$tron->fromHex(readline('From Hex:'))."\n";
//result: TT67rPNwgmpeimvHUMVzFfKsjL9GZ1wGw8