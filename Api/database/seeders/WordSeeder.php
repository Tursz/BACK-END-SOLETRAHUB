<?php

namespace Database\Seeders;

use App\Models\Word;
use DOMDocument;
use DOMXPath;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->four();
        $this->five();
        $this->six();
        $this->seven();
        $this->eight();
    }

    public function four()
    {
        $httpClient = new \GuzzleHttp\Client();

        $response = $httpClient->get('https://www.dicio.com.br/palavras-com-quatro-letras/');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();

        $doc->loadHTML($htmlString);

        $xpath = new DOMXPath($doc);
        foreach ($xpath->query('//div[@class="col-xs-12 col-md-8 card new-advanced-search-card mb20"]/p') as $paragraph) {
            foreach ($paragraph->childNodes as $childNode) {
                if ($childNode->nodeType === XML_TEXT_NODE) {
                    $word = $childNode->textContent;
                    if (mb_strlen($word, 'UTF-8') === 4) {
                        Word::create(['word' => Str::ascii($word)]);
                    }
                }
            }
        }
    }
    public function five()
    {
        $httpClient = new \GuzzleHttp\Client();

        $response = $httpClient->get('https://www.dicio.com.br/palavras-com-v-com-5-letras/');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();

        $doc->loadHTML($htmlString);

        $xpath = new DOMXPath($doc);

        foreach ($xpath->query('//div[@class="col-xs-12 col-md-8 card new-advanced-search-card mb20"]/p') as $paragraph) {
            foreach ($paragraph->childNodes as $childNode) {
                if ($childNode->nodeType === XML_TEXT_NODE) {
                    $word = $childNode->textContent;
                    if (mb_strlen($word, 'UTF-8') === 5) {
                        Word::create(['word' => Str::ascii($word)]);
                    }
                }
            }
        }
    }
    public function six()
    {
        $httpClient = new \GuzzleHttp\Client();

        $response = $httpClient->get('https://www.dicio.com.br/palavras-com-seis-letras/');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();

        $doc->loadHTML($htmlString);

        $xpath = new DOMXPath($doc);
        foreach ($xpath->query('//div[@class="col-xs-12 col-md-8 card new-advanced-search-card mb20"]/p') as $paragraph) {
            foreach ($paragraph->childNodes as $childNode) {
                if ($childNode->nodeType === XML_TEXT_NODE) {
                    $word = $childNode->textContent;
                    if (mb_strlen($word, 'UTF-8') === 6) {
                        Word::create(['word' => Str::ascii($word)]);
                    }
                }
            }
        }
    }
    public function seven()
    {
        $httpClient = new \GuzzleHttp\Client();

        $response = $httpClient->get('https://www.dicio.com.br/palavras-com-sete-letras/');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();

        $doc->loadHTML($htmlString);

        $xpath = new DOMXPath($doc);
        foreach ($xpath->query('//div[@class="col-xs-12 col-md-8 card new-advanced-search-card mb20"]/p') as $paragraph) {
            foreach ($paragraph->childNodes as $childNode) {
                if ($childNode->nodeType === XML_TEXT_NODE) {
                    $word = $childNode->textContent;
                    if (mb_strlen($word, 'UTF-8') === 7) {
                        Word::create(['word' => Str::ascii($word)]);
                    }
                }
            }
        }
    }
    public function eight()
    {
        $httpClient = new \GuzzleHttp\Client();

        $response = $httpClient->get('https://www.dicio.com.br/palavras-com-oito-letras/');
        $htmlString = (string) $response->getBody();

        libxml_use_internal_errors(true);

        $doc = new DOMDocument();

        $doc->loadHTML($htmlString);

        $xpath = new DOMXPath($doc);
        foreach ($xpath->query('//div[@class="col-xs-12 col-md-8 card"]/p') as $paragraph) {
            foreach ($paragraph->childNodes as $childNode) {
                if ($childNode->nodeType === XML_TEXT_NODE) {
                    $word = $childNode->textContent;
                    if (mb_strlen($word, 'UTF-8') === 8) {
                        Word::create(['word' => Str::ascii($word)]);
                    }
                }
            }
        }
    }
}
