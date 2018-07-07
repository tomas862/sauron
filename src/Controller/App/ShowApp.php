<?php

declare(strict_types=1);

namespace App\Controller\App;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowApp extends AbstractController
{
    /**
     * Loads main app content
     *
     * @Route(path="/", methods={"GET"}, name="root")
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        return $this->render('app/app.html.twig');
    }
}
