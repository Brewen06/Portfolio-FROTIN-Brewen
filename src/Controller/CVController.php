<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CVController extends AbstractController
{
    #[Route('/cv', name: 'app_cv')]
    public function index(): Response
    {
        return $this->render('cv/index.html.twig', [
            'controller_name' => 'CVController',
        ]);
    }
    public function download(): Response
    {
        $path = $this->getParameter('kernel.project_dir') . '/public/CV.pdf';
        return $this->file($path, 'CV.pdf');
    }
}
