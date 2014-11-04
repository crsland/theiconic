<?php
namespace App\Repos\SearchEngine;

/**
 * @class BingSearchEngine
 */
class BingSearchEngine implements SearchEngineRepository
{
    
    private $apiKey;
    private $clientId;

    public function __construct(\Msft_Bing_Search $bing) {
        $this->apiKey = 'MYnsjJ64';
        $this->clientId = 'a605de5a-75df-4be6-ba1b-c038d9022da6';
        $this->bing = $bing;
    }

    /**
     * Search
     * @param string $query The user input
     * @return array The search results
     */
    public function search($query)
    {
        $this->bing->setQuery(urlencode($query))
            ->setWebCount(10)
            ->setSource('Web');
        $data = json_decode($this->bing->search());
        //var_dump($data->SearchResponse->Errors);die;
        if (count($data->SearchResponse->Errors)) {
            $data = false;
        }
        return $data;
    }
}
