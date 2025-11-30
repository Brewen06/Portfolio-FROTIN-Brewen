<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VeilleController extends AbstractController
{
    #[Route('/veille', name: 'app_veille')]
    public function index(): Response
    {
        $rss_url = 'https://api.rss2json.com/v1/api.json?rss_url=https://www.lemondeinformatique.fr/flux-rss/thematique/intelligence-artificielle/rss.xml';
        $feed_items = [];

        $response = file_get_contents($rss_url);
        if ($response !== false) {
            $data = json_decode($response, true);
            if (isset($data['items'])) {
                $feed_items = $data['items'];
            }
        }
        return $this->render('veille/index.html.twig', [
            'controller_name' => 'VeilleController',
            'feed_items' => $feed_items,
            'rss_url' => $rss_url,
            'page_title' => 'Veille Technologique'
        ]);
    }
}
