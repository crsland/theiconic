<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'bootstrap.php';

class Search
{
    
    private $se;
    
    public function __construct(\SearchEngine\SearchEngineRepository $se)
    {
        $this->se = $se;
    }
    
    public function search($query)
    {
        
        $data = $this->se->search($query);
        
        if ($data) {
            
        } else {
            $data = '';
        }
        return $data;
    }
}


if(count($_POST)){
    
    $query = urldecode($_POST['query']);
    $searchEngine = $_POST['searchEngine'];
    $result = [
        'error' => false,
        'items' => []
    ];
    
    
    if(isset($container[$searchEngine])){
        
        $Search = new Search($container[$searchEngine]);
        $items = $Search->search($query);
        
        if ($items) {
            $result['items'] = $items;
        } else {
            $result['error'] = true;    
        }
        
    }else{
        $result['error'] = true;
        //throw new Exception('Error: No search engine.');
    }
    
    echo json_encode($result);
}