<?php
namespace App\Repos\SearchEngine;

/**
 * @class ExaLeadSearchEngine
 */
class ExaLeadSearchEngine implements SearchEngineRepository
{
    
    public function __construct()
    {
        return $this;
    }

    /**
     * Search
     * @param string $query The user input
     * @return array The search results
     */    
    public function search($query)
    {   
        $url = 'http://www.exalead.com/search/web/results/?q='.urlencode($query);
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
            $list = $xpath->query("//ul[@class = 'media-list']/li[@class = 'media']");

            foreach ($list as $textNode) {
                $tmpLink = $xpath->query("div[@class = 'media-body']/a",$textNode);
                $link = $tmpLink->item(0)->getAttribute('href');
                
                $tmpTitle = $xpath->query("div[@class = 'media-body']/h4",$textNode);
                $title = $tmpTitle->item(0)->textContent;

                $tmpDescription = $xpath->query("div[@class = 'media-body']/p",$textNode);
                $description = $tmpDescription->item(0)->textContent;
                
                $output[] = [
                    'title' => $title,
                    'link' => $link,
                    'description' => $description
                ];
            }
        }
        return $output;
    }
}