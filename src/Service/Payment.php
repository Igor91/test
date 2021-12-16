<?php

namespace Service;

use Errors\PaymentError;
use Interfaces\PayBack;

class Payment
{
    private float $total;

    private PayBack $payBackService;

    public function __construct(array $coins, PayBack $payBack)
    {
        $this->calculateTotal($coins);
        $this->payBackService = $payBack;
    }

    public function pay(float $price): bool
    {
        $priceInCoin = $this->getCoinPrice($price);

        if ($priceInCoin > $this->total) {
            throw new PaymentError();
        }

        $this->deduct($priceInCoin);

        return $this->total;
    }

    public function payBack(): array
    {
        return $this->payBackService->getCoins($this->total);
    }

    private function deduct(int $total): void
    {
        $this->total -= $total;
    }

    private function calculateTotal(array $coins): float
    {
        $total = 0;

        foreach($coins as $coin) {
            $total += $coin;
        }

        return $this->total = $total;
    }

    private function getCoinPrice(float $total): int
    {
        return $total * 100;
    }
}
