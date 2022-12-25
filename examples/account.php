<?php
include_once '../vendor/autoload.php';

try {
    $tron = new \IEXBase\TronAPI\Tron();

    $generateAddress = $tron->generateAddress(); // or createAddress()

    echo 'Address hex: '. $generateAddress->getAddress()."\n";
    echo 'Address base58: '. $generateAddress->getAddress(true)."\n";
    echo 'Private key: '. $generateAddress->getPrivateKey()."\n";
    echo 'Public key: '. $generateAddress->getPublicKey()."\n";
    echo 'Is Valid: '. ($tron->isAddress($generateAddress->getAddress(true)) ? 'Y' : 'N')."\n";

    echo 'Raw data: '.var_export($generateAddress->getRawData(), true)."\n";

} catch (\IEXBase\TronAPI\Exception\TronException $e) {
    echo $e->getMessage();
}