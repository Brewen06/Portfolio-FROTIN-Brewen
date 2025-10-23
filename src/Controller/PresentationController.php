<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class PresentationController extends AbstractController
{
    #[Route(path:"/", name:"app_index")]
    public function index(Request $request): Response
    {
        return $this->render('/index.html.twig', [
            'controller_name' => 'PresentationController',
        ]);
    }
    
}
