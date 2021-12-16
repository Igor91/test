<?php

namespace Interfaces;

interface ProductProvider
{
    public function getProduct($name): Product;
}
