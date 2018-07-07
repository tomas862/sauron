<?php

declare(strict_types=1);

namespace App\Controller\Api\Project;

use App\Handler\Project\CreateProject\CreateProjectCommand;
use App\Handler\Project\CreateProject\ProjectResponse;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CreateProject extends AbstractController
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * CreateProject constructor.
     *
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * Creates project - project is used as a placeholder for inner app logic
     *
     * @Route(path="/api/project/create", methods={"POST"}, name="project_create")
     *
     */
    public function __invoke()
    {
        /** @var ProjectResponse $result */
        $result = $this->commandBus->handle(
            new CreateProjectCommand('test')
        );

        return new JsonResponse($result->serialize());
    }
}
