<?php

namespace Service;

use Entity\SimpleProduct;
use Interfaces\Product;
use Interfaces\ProductProvider as ProductProviderInterface;

class ProductProvider implements ProductProviderInterface
{
    /**
     * @var Product[]
     */
    private array $availableProducts;

    public function __construct(array $availableProducts)
    {
        $this->availableProducts = $availableProducts;
    }

    public function getProduct($name): Product
    {
        $productCost = $this->availableProducts[$name] ?? null;

        if (!$productCost) {
            throw new ProductNotFoundException();
        }

        return new SimpleProduct($productCost);
    }
}
