<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ObtentionsController extends AbstractController
{
    #[Route('/obtentions', name: 'app_obtentions')]
    public function index(): Response
    {
        return $this->render('obtentions/index.html.twig', [
            'controller_name' => 'ObtentionsController',
        ]);
    }
}
