<?php

namespace Service;

use Errors\ValidationError;
use Validators\Coin as CoinValidator;
use Validators\Request as RequestValidator;

class Request
{
    private array $request;

    public function __construct(array $request)
    {
        $this->request = $request;
        $this->validate();
    }

    public function getProductName(): string
    {
        return $this->request['product'];
    }

    /**
     * @return int[]
     */
    public function getCoins(): array
    {
        return array_map(function ($coin) {
            return intval($coin);
        }, explode(',', $this->request['coins']));
    }

    private function validate(): void
    {
        $validator = new RequestValidator();
        if (!$validator->validate($this->request)) {
            throw new ValidationError('Wrong request');
        }

        $validator = new CoinValidator();
        if ($validator->validate($this->getCoins())) {
            throw new ValidationError('There are incorrect coin');
        }
    }
}
