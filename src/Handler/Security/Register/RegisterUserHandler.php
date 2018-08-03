<?php

namespace App\Handler\Security\Register;

use Doctrine\Common\Persistence\ObjectManager;

class RegisterUserHandler
{
    /**
     *
     * @var ObjectManager
     */
    private $manager;

    /**
     * CreateProjectHandler constructor.
     *
     * @param ObjectManager $manager
     */
    public function __construct(
        ObjectManager $manager
    ) {
        $this->manager = $manager;
    }

    public function handle(RegisterUserCommand $command)
    {
        //todo: implement
    }
}
