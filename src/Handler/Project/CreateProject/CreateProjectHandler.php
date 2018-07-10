<?php

declare(strict_types=1);

namespace App\Handler\Project\CreateProject;

use App\Document\Project;
use Doctrine\Common\Persistence\ObjectManager;

class CreateProjectHandler
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

    public function handle(CreateProjectCommand $command)
    {
        $project = new Project();
        $project->setName($command->getName());

        $this->manager->persist($project);
        $this->manager->flush();

        return new CreateProjectResponse($project);
    }
}
