<?php

namespace Service;

use Entity\SimpleProduct;
use \Interfaces\VendingMachine as VendingMachineInterface;
use \Interfaces\Response as ResponseInterface;

class VendingMachine implements VendingMachineInterface
{
    private Payment $paymentService;

    private ResponseInterface $responseService;

    public function __construct(Payment $payment, ResponseInterface $response)
    {
        $this->paymentService = $payment;
        $this->responseService = $response;
    }

    public function execute(SimpleProduct $product): string
    {
        $this->paymentService->pay($product->getCost());
        $payBackCoins = $this->paymentService->payBack();

        return $this->responseService->getOutput($payBackCoins, $product);
    }
}
