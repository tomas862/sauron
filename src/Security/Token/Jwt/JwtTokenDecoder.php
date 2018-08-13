<?php

namespace App\Security\Token\Jwt;

use App\Security\Token\TokenDecoderInterface;
use Firebase\JWT\JWT;

class JwtTokenDecoder implements TokenDecoderInterface
{
    /**
     * @inheritDoc
     */
    public function decode(string $token): array
    {
        return (array) JWT::decode($token, getenv('APP_SECRET'));
    }
}
