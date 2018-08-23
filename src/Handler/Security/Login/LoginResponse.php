<?php

declare(strict_types=1);

namespace App\Handler\Security\Login;

use App\Handler\HandlerResultInterface;

final class LoginResponse implements HandlerResultInterface
{
    /**
     * @var string
     */
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize(): array
    {
        return [
            'token' => $this->getToken()
        ];
    }
}
