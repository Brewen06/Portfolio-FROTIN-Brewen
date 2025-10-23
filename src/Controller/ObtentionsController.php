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
    #[Route('/obtentions/certifications', name: 'app_obtentions_certifications')]
    public function certifications(): Response
    {
        return $this->render('obtentions/certifications.html.twig', [
            'controller_name' => 'ObtentionsController',
        ]);
    }
    #[Route('/obtentions/diplomes/attestation-ANSSI.pdf', name: 'app_obtentions_diplomes_pdf')]
    public function AfficherPDF(){
        $path =  'C:\Users\ordi2124253\Documents\Portfolio-FROTIN-Brewen\public\attestation-ANSSI.pdf';
        return $this->file($path);
    }
    #[Route('/obtentions/diplomes', name: 'app_obtentions_diplomes')]
    public function diplomes(): Response
    {
        return $this->render('obtentions/diplomes.html.twig', [
            'controller_name' => 'ObtentionsController',
        ]);
    }
}
