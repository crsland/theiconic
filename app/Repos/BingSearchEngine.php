<?php
namespace App\Repos\SearchEngine;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
