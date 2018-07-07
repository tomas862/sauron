<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

use App\Document\Project;

class ProjectResponse
{
    /**
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

    public function serialize(): array
    {
        return [
            'name' => $this->getName()
        ];
    }
}
