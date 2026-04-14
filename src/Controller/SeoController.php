<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

final class SeoController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults: ['_format' => 'xml'])]
    public function sitemap(UrlGeneratorInterface $urlGenerator): Response
    {
        $routes = [
            ['name' => 'app_index', 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['name' => 'app_competences', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['name' => 'app_competences_programmation', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['name' => 'app_competences_reseaux', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['name' => 'app_competences_cyber', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['name' => 'app_experience', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['name' => 'app_projet', 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['name' => 'app_projet_professionel', 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['name' => 'app_projet_realise', 'changefreq' => 'monthly', 'priority' => '0.9'],
            ['name' => 'app_obtentions', 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['name' => 'app_obtentions_certifications', 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['name' => 'app_obtentions_diplomes', 'changefreq' => 'monthly', 'priority' => '0.7'],
            ['name' => 'app_veille', 'changefreq' => 'daily', 'priority' => '0.7'],
            ['name' => 'app_cv', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['name' => 'app_contact', 'changefreq' => 'yearly', 'priority' => '0.5'],
        ];

        $urls = [];

        foreach ($routes as $route) {
            $urls[] = [
                'loc' => $urlGenerator->generate($route['name'], [], UrlGeneratorInterface::ABSOLUTE_URL),
                'lastmod' => (new \DateTimeImmutable('today'))->format('Y-m-d'),
                'changefreq' => $route['changefreq'],
                'priority' => $route['priority'],
            ];
        }

        $response = $this->render('seo/sitemap.xml.twig', [
            'urls' => $urls,
        ]);
        $response->headers->set('Content-Type', 'application/xml; charset=UTF-8');

        return $response;
    }

    #[Route('/robots.txt', name: 'app_robots')]
    public function robots(Request $request): Response
    {
        $sitemapUrl = $request->getSchemeAndHttpHost() . '/sitemap.xml';
        $content = "User-agent: *\n";
        $content .= "Allow: /\n";
        $content .= "Disallow: /_profiler\n";
        $content .= "Disallow: /_wdt\n";
        $content .= "Sitemap: {$sitemapUrl}\n";

        return new Response($content, Response::HTTP_OK, [
            'Content-Type' => 'text/plain; charset=UTF-8',
        ]);
    }
}
