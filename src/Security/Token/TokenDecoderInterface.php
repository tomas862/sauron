<?php

namespace App\Security\Token;

interface TokenDecoderInterface
{
    /**
     * @param string $token
     *
     * @return array
     */
    public function decode(string $token): array;
}
