<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

use App\Document\Project;
use App\Handler\HandlerResultInterface;

class ProjectResponse implements HandlerResultInterface
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

    /**
     * @inheritDoc
     */
    public function getResponseMessage(): ?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function serialize(): array
    {
        return [
            'name' => $this->project->getName()
        ];
    }
}
