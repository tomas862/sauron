<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Document\User;
use App\Security\SecurityUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @inheritDoc
     */
    public function load(ObjectManager $manager)
    {
        $securityUser = new SecurityUser();
        $password = $this->encoder->encodePassword($securityUser, 'demodemo');

        $user = new User();
        $user->setEmail('testUserEmail@email.com');
        $user->setPassword($password);
        $manager->persist($user);
        $manager->flush();
    }
}
