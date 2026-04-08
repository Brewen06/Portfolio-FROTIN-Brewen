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
        $rss_sources = [
            'Le Monde Informatique' => 'https://www.lemondeinformatique.fr/flux-rss/thematique/intelligence-artificielle/rss.xml',
        ];
        $feed_items = [];
        $seen_links = [];

        foreach ($rss_sources as $source_name => $source_url) {
            $rss_url = 'https://api.rss2json.com/v1/api.json?rss_url='.urlencode($source_url);
            $response = file_get_contents($rss_url);

            if ($response === false) {
                continue;
            }

            $data = json_decode($response, true);
            if (!isset($data['items']) || !is_array($data['items'])) {
                continue;
            }

            foreach ($data['items'] as $item) {
                if (!is_array($item)) {
                    continue;
                }

                $link = isset($item['link']) && is_string($item['link']) ? $item['link'] : '';
                if ($link === '' || isset($seen_links[$link])) {
                    continue;
                }

                $seen_links[$link] = true;
                $feed_items[] = [
                    'title' => isset($item['title']) && is_string($item['title']) ? $item['title'] : 'Article sans titre',
                    'link' => $link,
                    'description' => isset($item['description']) && is_string($item['description']) ? $item['description'] : '',
                    'pubDate' => isset($item['pubDate']) && is_string($item['pubDate']) ? $item['pubDate'] : '',
                    'source' => $source_name,
                ];
            }
        }

        usort($feed_items, static function (array $a, array $b): int {
            $date_a = strtotime($a['pubDate'] ?? '');
            $date_b = strtotime($b['pubDate'] ?? '');

            return ($date_b ?: 0) <=> ($date_a ?: 0);
        });

        return $this->render('veille/index.html.twig', [
            'controller_name' => 'VeilleController',
            'feed_items' => $feed_items,
            'rss_sources' => $rss_sources,
            'page_title' => 'Veille Technologique'
        ]);
    }
}
