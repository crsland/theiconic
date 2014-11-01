<?php
namespace SearchEngine;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class YahooSearchEngine implements SearchEngineRepository
{
    
    private $apiKey;
    
    public function __construct()
    {
        $this->apiKey = 'dj0yJmk9WVpyZWVsOGd6eEV3JmQ9WVdrOVRWbHVjMnBLTmpRbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1mMw--';
    }


    public function search($query)
    {
        
        $url = 'http://search.yahooapis.com/WebSearchService/V1/webSearch?appid=Y'.$this->apiKey.'&query='.urlencode($query).'&results=10';
        //$useragent = "Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.14912/870; U; id) Presto/2.4.15";
        $ch = curl_init ("");
        curl_setopt ($ch, CURLOPT_URL, $url);
        
        curl_setopt($ch, CURLOPT_HEADER, false); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);         
        
        /*curl_setopt ($ch, CURLOPT_USERAGENT, $useragent); // set user agent
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);*/
        $data = curl_exec ($ch);

        curl_close($ch);
        return $data;
        
    }
}
