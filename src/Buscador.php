<?php

namespace juliocsimoesp\BuscadorCursos;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var Client
     */
    private $client;
    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(string $baseUrl)
    {
        $this->client = new Client(['base_uri' => $baseUrl]);
        $this->crawler = new Crawler();
    }

    public function buscarCursos(string $url, array $options = ['verify' => false]): array
    {
        $resposta = $this->client->request('GET', $url, $options);
        $html = $resposta->getBody();

        $this->crawler->addHtmlContent($html);

        $elementoCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementoCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }

        return $cursos;
    }
}
