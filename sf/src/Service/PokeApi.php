<?php

namespace App\Service;

use App\Entity\Monster;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokeApi
{

    public function __construct(
        private readonly HttpClientInterface $httpClient,
        private readonly LoggerInterface $logger
    )
    {
    }

    public function featchTranslation(Monster $monster) : ?string {
        try{
            $response = $this->httpClient->request(
                'GET',
                sprintf('https://pokeapi.co/api/v2/pokemon-species/%s', $monster->dexNumber)
            );
            return array_find(json_decode($response->getContent())->names, fn($names) => $names->language->name === 'fr')->name;
        }catch(\Exception $e){
            $this->logger->error($e->getMessage());
            return null;
        }
    }

}
