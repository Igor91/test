<?php

namespace Interfaces;

interface PayBack
{
    public function getCoins(int $total): array;
}
