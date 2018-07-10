<?php

declare(strict_types=1);

namespace App\Handler;

interface HandlerResultInterface
{
    /**
     * Used for serializing object data.
     *
     * @return array
     */
    public function serialize(): array;
}
