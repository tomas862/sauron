<?php

declare(strict_types=1);

namespace App\Handler\Security\Login;

use App\Document\User;
use Symfony\Component\EventDispatcher\Event;

class LoginEvent extends Event
{

    /**
     * @var string
     */
    private $token;
    /**
     * @var User|null
     */
    private $user;

    public function __construct(?User $user)
    {

        $this->user = $user;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}
