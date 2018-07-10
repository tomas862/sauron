<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

use Symfony\Component\Validator\Constraints as Assert;

class CreateProjectCommand
{
    /**
     *
     * @Assert\NotBlank()
     */
    private $name;

    /**
     *
     * @param string $name
     *
     * @return CreateProjectCommand
     */
    public function setName(string $name): CreateProjectCommand
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
