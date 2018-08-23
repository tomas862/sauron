<?php

declare(strict_types=1);

namespace App\Handler\Security\Login;

use App\Security\Token\TokenEncoderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class LoginEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenEncoderInterface
     */
    private $tokenEncoder;

    public function __construct(TokenEncoderInterface $tokenEncoder)
    {
        $this->tokenEncoder = $tokenEncoder;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            LoginEvent::class => [
                ['isLoggedIn', 1],
                ['createToken', 0]
            ]
        ];
    }

    public function isLoggedIn(LoginEvent $event): void
    {
        if (null === $event->getUser()) {
            $event->stopPropagation();
        }
    }

    public function createToken(LoginEvent $event): void
    {
        $token = $this->tokenEncoder->encode(
            [
                'user_id' => $event->getUser()->getId()
            ]
        );

        $event->setToken($token);
    }
}
