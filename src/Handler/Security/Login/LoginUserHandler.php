<?php

declare(strict_types=1);

namespace App\Handler\Security\Login;

use App\Document\User;
use App\Security\SecurityUser;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class LoginUserHandler
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

    public function handle(LoginUserCommand $command)
    {
        $securityUser = new SecurityUser();
        $password = $this->passwordEncoder->encodePassword($securityUser, $command->getPlainPassword());

        $user = $this->manager
            ->getRepository(User::class)
            ->findOneBy([
                'email' => $command->getEmail(),
                'password' => $password
            ]);

        $event = new LoginEvent($user);

        $this->eventDispatcher->dispatch(
            LoginEvent::class,
            $event
        );
    }
}
