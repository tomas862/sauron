<?php

namespace App\Controller\Security;

use App\Handler\Security\Register\RegisterUserCommand;
use League\Tactician\CommandBus;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class RegisterUser extends AbstractController
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

    public function __invoke(Request $request)
    {
        $data = $request->getContent();
        $registerUserCommand = $this->serializer->deserialize($data, RegisterUserCommand::class, 'json');

        $result = $this->commandBus->handle($registerUserCommand);
        return new JsonResponse($result->serialize());
    }
}
