<?php

namespace App\Handler\Security\Register;

use App\Security\Token\TokenEncoderInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class RegistrationEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var TokenEncoderInterface
     */
    private $tokenEncoder;

    /**
     * RegistrationEventSubscriber constructor.
     *
     * @param TokenEncoderInterface $tokenEncoder
     */
    public function __construct(TokenEncoderInterface $tokenEncoder)
    {
        $this->tokenEncoder = $tokenEncoder;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            UserRegisteredEvent::class => 'setToken'
        ];
    }

    public function setToken(UserRegisteredEvent $event): void
    {
        $data = [
            'user_id' => $event->getUser()->getId()
        ];
        $token = $this->tokenEncoder->encode($data);
        $event->setToken($token);
    }
}
