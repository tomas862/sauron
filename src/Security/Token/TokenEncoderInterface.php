<?php

namespace App\Security\Token;

interface TokenEncoderInterface
{
    /**
     * @param array $data
     *
     * @return string
     */
    public function encode(array $data): string;
}
