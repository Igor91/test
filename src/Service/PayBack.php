<?php

namespace Service;

use Interfaces\PayBack as PayBackInterface;

class PayBack implements PayBackInterface
{
    private array $availableCoins;

    public function __construct(array $availableCoins)
    {
        arsort($availableCoins);
        $this->availableCoins = $availableCoins;
    }

    public function getCoins(int $total): array
    {
        $coins = [];
        $backOutCoinTotal = $total;

        while ($backOutCoinTotal != 0) {
            foreach ($this->availableCoins as $coin) {
                if ($coin <= $backOutCoinTotal) {
                    $backOutCoinTotal -= $coin;
                    $coins[] = $coin;
                    break;
                }
            }
        }

        return $coins;
    }
}
