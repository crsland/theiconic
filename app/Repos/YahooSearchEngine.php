<?php
namespace App\Repos\SearchEngine;
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

    /**
     * Search
     * @param string $query The user input
     * @return array The search results
     */
    public function search($query)
    {
        $result = $this->getPage(
            '162.216.155.136:9050',
            'https://search.yahoo.com/search?p='. urldecode($query),
            'http://www.yahoo.com/',
            'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.8) Gecko/2009032609 Firefox/3.0.8',
            1,
            5);
        
        return $result;
    }
    
    /**
     * Get Page
     * @param string $proxy The user input
     * @param string $url The user input
     * @param string $referer The user input
     * @param string $agent The user input
     * @param string $header The user input
     * @param int $timeout The user input
     * @return array The search results
     */
    private function getPage($proxy, $url, $referer, $agent, $header, $timeout)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_REFERER, $referer);
        curl_setopt($ch, CURLOPT_USERAGENT, $agent);

        $result['EXE'] = curl_exec($ch);
        $result['INF'] = curl_getinfo($ch);
        $result['ERR'] = curl_error($ch);

        curl_close($ch);

        return $result;
    }
}