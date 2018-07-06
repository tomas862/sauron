<?php

declare(strict_types=1);

namespace App\Controller\App;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowApp extends AbstractController
{
    /**
     * Loads main app content
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return $this->render('app/app.html.twig');
    }
}
