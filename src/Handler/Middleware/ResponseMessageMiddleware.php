<?php

declare(strict_types=1);

namespace App\Handler\Middleware;

use App\Handler\HandlerResultInterface;
use League\Tactician\Middleware;
use Symfony\Component\HttpFoundation\JsonResponse;

class ResponseMessageMiddleware implements Middleware
{
    public function execute($command, callable $next)
    {
        /** @var HandlerResultInterface $returnValue */
        $returnValue = $next($command);
        $serializedResult = [
            'message' => $returnValue->getResponseMessage() ?: 'ok',
            'body' => $returnValue->serialize()
        ];
        
        return new JsonResponse($serializedResult);
    }
}
