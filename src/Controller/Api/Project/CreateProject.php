<?php

declare(strict_types=1);

namespace App\Controller\Api\Project;

use App\Handler\HandlerResultInterface;
use App\Handler\Project\CreateProject\CreateProjectCommand;
use App\Handler\Project\CreateProject\CreateProjectResponse;
use League\Tactician\CommandBus;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Swagger\Annotations as SWG;

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
     *
     * @SWG\Parameter(
     *     name="name",
     *     in="body",
     *     @SWG\Schema(ref=@Model(type=CreateProjectCommand::class)),
     *     required=true,
     *     type="string",
     *     description="project name"
     * )
     *
     * @SWG\Response(
     *     response="200",
     *     description="creates new project",
     *     @SWG\Schema(ref=@Model(type=CreateProjectResponse::class))
     * )
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

        /** @var HandlerResultInterface $result */
        $result = $this->commandBus->handle(
            $createProjectCommand
        );

        return new JsonResponse($result->serialize());
    }
}
