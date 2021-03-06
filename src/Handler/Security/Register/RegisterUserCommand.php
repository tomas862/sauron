<?php

namespace App\Handler\Security\Register;

use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as AppAssert;

class RegisterUserCommand
{
    /**
     * @var string
     * @Assert\NotBlank()
     * @AppAssert\UniqueEmail
     * @Assert\Email()
     */
    private $email;
    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * @param string $plainPassword
     */
    public function setPlainPassword(string $plainPassword): void
    {
        $this->plainPassword = $plainPassword;
    }
}
