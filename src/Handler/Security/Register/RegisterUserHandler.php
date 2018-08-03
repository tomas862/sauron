<?php

namespace App\Handler\Security\Register;

use App\Document\User;
use App\Security\SecurityUser;
use Doctrine\Common\Persistence\ObjectManager;
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
     * CreateProjectHandler constructor.
     *
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(
        ObjectManager $manager,
        UserPasswordEncoderInterface $passwordEncoder
    ) {
        $this->manager = $manager;
        $this->passwordEncoder = $passwordEncoder;
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

        return new RegisterUserResponse();
    }
}
