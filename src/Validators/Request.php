<?php

namespace Validators;

class Request
{
    /**
     * @param array $data
     * @return bool
     */
    public function validate(array $data): bool
    {
        return isset($data['coins']) && isset($data['product']);
    }
}
