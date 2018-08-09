<?php

namespace App\Handler\Security\Register;

use App\Document\User;
use Symfony\Component\EventDispatcher\Event;

class UserRegisteredEvent extends Event
{
    /**
     * @var User
     */
    private $user;
    /**
     * @var string $token
     */
    private $token;

    /**
     * UserRegisteredEvent constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setToken(string $token)
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
}
