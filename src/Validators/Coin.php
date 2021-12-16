<?php

namespace Validators;

class Coin
{
    /**
     * @param int[] $coins
     * @return bool
     */
    public function validate(array $coins): bool
    {
        $availableCoins = \Config::availableCoins;

        foreach ($coins as $coin) {
            if (!isset($availableCoins[$coin])) {
                return false;
            }
        }

        return true;
    }
}
