<?php

declare(strict_types=1);

namespace App\Handler;

interface HandlerResultInterface
{
    /**
     * Custom response message if defined
     * @return null|string
     */
    public function getResponseMessage():?string;

    /**
     * Used for serializing object data.
     *
     * @return array
     */
    public function serialize(): array;
}
