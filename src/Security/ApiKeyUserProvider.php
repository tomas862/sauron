<?php

declare(strict_types=1);

namespace App\Security;

use App\Document\User;
use App\Security\Token\TokenDecoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * @var TokenDecoderInterface
     */
    private $tokenDecoder;
    /**
     * @var ObjectManager
     */
    private $objectManager;

    public function __construct(
        TokenDecoderInterface $tokenDecoder,
        ObjectManager $objectManager
    ) {
        $this->tokenDecoder = $tokenDecoder;
        $this->objectManager = $objectManager;
    }

    public function getIdByApiKey(string $apiKey): string
    {
        $decoded = $this->tokenDecoder->decode($apiKey);
        return $decoded['user_id'] ?? '';
    }

    /**
     * @inheritDoc
     */
    public function loadUserByUsername($userId)
    {
        $user = $this->objectManager
            ->getRepository(User::class)
            ->find($userId);

        $securityUser = new SecurityUser();
        $securityUser->setUsername($user->getEmail());
        return $securityUser;
    }

    /**
     * @inheritDoc
     */
    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    /**
     * @inheritDoc
     */
    public function supportsClass($class)
    {
        return SecurityUser::class === $class;
    }
}
