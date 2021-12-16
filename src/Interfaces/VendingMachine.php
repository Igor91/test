<?php

namespace Interfaces;

use Entity\SimpleProduct;

interface VendingMachine
{
    public function execute(SimpleProduct $product): string;
}
