<?php

$loader = require __DIR__ . '/vendor/autoload.php';

use Service\Request;
use Service\VendingMachine;
use Service\PayBack;
use Service\Response;
use Service\Payment;
use Service\ProductProvider;

echo "\n";
echo 'Start execution';
echo "\n\n";

$input = getopt(null, ['coins:', 'product:']);

$requestService = new Request($input);
$payBack = new PayBack(Config::availableCoins);
$payment = new Payment($requestService->getCoins(), $payBack);
$productProvide = new ProductProvider(Config::products);
$vendingMachine = new VendingMachine($payment, new Response());

try {
    $product = $productProvide->getProduct($requestService->getProductName());
    echo $vendingMachine->execute($product);
} catch (\Errors\ProductNotFoundError $exception) {
    echo 'Missing product';
} catch (\Errors\PaymentError $exception) {
    echo 'Not enough money!';
} catch (\Errors\ValidationError $exception) {
    echo 'Validation error: ' . $exception->getMessage();
} catch (Exception $exception) {
    echo 'Something went wrong';
}

echo "\n\n";
echo 'End execution';
echo "\n";
