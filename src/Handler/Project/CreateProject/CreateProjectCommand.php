<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

class CreateProjectCommand
{
    /**
     * @var string
     */
    private $name;

    /**
     * CreateProject constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
