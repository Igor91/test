<?php

namespace Service;

use Entity\SimpleProduct;
use Interfaces\Response as ResponseInterface;

class Response implements ResponseInterface
{
    public function getOutput(array $coins, SimpleProduct $product): string
    {
        $message = 'Thank you! You both product with cost ' . $product->getCost();

        if (count($coins)) {
            $message .= ' Take you pay back coins ' . implode(',', $coins);
        }

        return $message;
    }
}
