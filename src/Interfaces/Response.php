<?php

namespace Interfaces;

use Entity\SimpleProduct;

interface Response
{
    public function getOutput(array $coins, SimpleProduct $product): string;
}
