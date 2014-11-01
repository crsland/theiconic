<?php

namespace App\Repos\SearchEngine;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GoogleSearchEngine implements SearchEngineRepository
{
    
    public function __construct()
    {
        return $this;
    }

    public function search($query)
    {
        $url = 'http://www.google.com/search?hl=en&tbo=d&site=&source=hp&q='.urlencode($query);
        $useragent = "Opera/9.80 (J2ME/MIDP; Opera Mini/4.2.14912/870; U; id) Presto/2.4.15";
        $ch = curl_init ("");
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_USERAGENT, $useragent); // set user agent
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        $data = curl_exec ($ch);
        curl_close($ch);
        
        return $this->format($data);
    }
    
    /**
    * Format
    * @param string $data 
    * @return array 
    */
    private function format($data)
    {
        $dom = new \DOMDocument();
        $html = @$dom->loadHTML($data);
        $output = [];
        
        if ($html) {
            $xpath = new \DOMXPath($dom);
            $list = $xpath->query("//div[@id = 'universal']/div[@class = 'web_result']");
            
            foreach ($list as $textNode) {
               $children = $textNode->childNodes;
               $link = $children->item(0)
                       ->getElementsByTagName('a')
                       ->item(0)
                       ->getAttribute('href');
               $needle = '/url?q=';
               if (strpos($link,$needle) === 0) {
                   $link = substr($link, strlen($needle));
               }
               $output[] = [
                   'title' => $children->item(0)->textContent,
                   'link' => $link,
                   'description' => $children->item(1)->textContent
               ];
            }
        }
        return $output;
    }
}