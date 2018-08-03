<?php

namespace App\Handler\Security\Register;

use App\Handler\HandlerResultInterface;

class RegisterUserResponse implements HandlerResultInterface
{
    /**
     * @inheritDoc
     */
    public function serialize(): array
    {
        return [];
    }
}
