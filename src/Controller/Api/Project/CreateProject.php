<?php

declare(strict_types=1);

namespace App\Controller\Api\Project;

use App\Handler\Project\CreateProject\CreateProjectCommand;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class CreateProject extends AbstractController
{
    /**
     * @var CommandBus
     */
    private $commandBus;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * CreateProject constructor.
     *
     * @param CommandBus $commandBus
     * @param SerializerInterface $serializer
     */
    public function __construct(CommandBus $commandBus, SerializerInterface $serializer)
    {
        $this->commandBus = $commandBus;
        $this->serializer = $serializer;
    }

    /**
     * Creates project - project is used as a placeholder for inner app logic
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \LogicException
     */
    public function __invoke(Request $request): Response
    {
        $data = $request->getContent();
        $createProjectCommand = $this->serializer->deserialize($data, CreateProjectCommand::class, 'json');

        return $this->commandBus->handle(
            $createProjectCommand
        );
    }
}
