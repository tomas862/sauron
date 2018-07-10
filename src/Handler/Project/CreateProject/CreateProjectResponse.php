<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

use App\Document\Project;
use App\Handler\HandlerResultInterface;

class CreateProjectResponse implements HandlerResultInterface
{
    /**
     *
     * @var Project
     */
    private $project;

    /**
     * ProjectResponse constructor.
     *
     * @param Project $project
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getName(): string
    {
        return $this->project->getName();
    }

    /**
     *
     * @inheritDoc
     */
    public function serialize(): array
    {
        return [
            'name' => $this->getName()
        ];
    }
}
