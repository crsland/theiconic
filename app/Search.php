<?php
require 'bootstrap.php';

class Search
{
    
    private $se;
    
    public function __construct(App\Repos\SearchEngine\SearchEngineRepository $se)
    {
        $this->se = $se;
    }
    
    /**
     * Set Search Engine
     */
    public function setSe(App\Repos\SearchEngine\SearchEngineRepository $se)
    {
        $this->se = $se;
    }


    public function get($query)
    {
        $result = [
            'error' => false,
            'items' => []
        ];        
        
        $data = $this->se->search($query);

        if ($data) {
            $result['items'] = $data;
        } else {
            $result['error'] = true;
        }
        return $result;
    }
}

if (count($_POST)) {
    
    $query = urldecode($_POST['query']);
    $searchEngine = $_POST['searchEngine'];
    $data = [];
    if (isset($container[$searchEngine])) {
        
        $Search = new Search($container[$searchEngine]);
        $data = $Search->get($query);
    } else {
        $data['error'] = true;
        //throw new Exception('Error: No search engine.');
    }
    echo json_encode($data);
}