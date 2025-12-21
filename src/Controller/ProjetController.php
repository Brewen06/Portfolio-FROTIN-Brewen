<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'app_projet')]
    public function index(): Response
    {
        return $this->render('projet/index.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    #[Route('/projet/professionel', name: 'app_projet_professionel')]
    public function professionel(): Response
    {
        return $this->render('projet/professionel.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }

    #[Route('/projet/realise', name: 'app_projet_realise')]
    public function realise(): Response
    {
        return $this->render('projet/realise.html.twig', [
            'controller_name' => 'ProjetController',
        ]);
    }
}
