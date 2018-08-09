<?php

namespace App\Security\Token\Jwt;

use App\Security\Token\TokenEncoderInterface;
use Firebase\JWT\JWT;

final class JwtTokenEncoder implements TokenEncoderInterface
{
    /**
     * @inheritDoc
     */
    public function encode(array $data): string
    {
        return JWT::encode($data, getenv('APP_SECRET'));
    }
}
