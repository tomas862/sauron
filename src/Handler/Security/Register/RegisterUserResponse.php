<?php

namespace App\Handler\Security\Register;

use App\Handler\HandlerResultInterface;

class RegisterUserResponse implements HandlerResultInterface
{
    /**
     * @var UserRegisteredEvent
     */
    private $event;

    public function __construct(UserRegisteredEvent $event)
    {
        $this->event = $event;
    }

    /**
     * @inheritDoc
     */
    public function serialize(): array
    {
        return [
            'token' => $this->event->getToken()
        ];
    }
}
