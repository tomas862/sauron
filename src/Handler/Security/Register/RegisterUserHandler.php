<?php

namespace App\Handler\Security\Register;

use App\Document\User;
use App\Security\SecurityUser;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterUserHandler
{
    /**
     *
     * @var ObjectManager
     */
    private $manager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * CreateProjectHandler constructor.
     *
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(
        ObjectManager $manager,
        UserPasswordEncoderInterface $passwordEncoder,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->manager = $manager;
        $this->passwordEncoder = $passwordEncoder;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(RegisterUserCommand $command)
    {
        $securityUser = new SecurityUser();
        $password = $this->passwordEncoder->encodePassword($securityUser, $command->getPlainPassword());

        $user = new User();

        $user->setEmail($command->getEmail());
        $user->setPassword($password);

        $this->manager->persist($user);
        $this->manager->flush();
        $event = new UserRegisteredEvent($user);
        $this->eventDispatcher->dispatch(
            UserRegisteredEvent::class,
            $event
        );

        return new RegisterUserResponse($event);
    }
}
