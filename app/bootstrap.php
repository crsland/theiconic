<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../vendor/autoload.php';
/*
use SearchEngine\GoogleSearchEngine\GoogleSearchEngine as Google;
use SearchEngine\YahooSearchEngine\YahooSearchEngine;
use SearchEngine\BingSearchEngine\BingSearchEngine;
*/
// TODO: Fix this. Use a good autoload.
require 'Repos/SearchEngineRepository.php';
require 'Repos/GoogleSearchEngine.php';
require 'Repos/YahooSearchEngine.php';
require 'Repos/BingSearchEngine.php';
require '../vendor/BingPHP/lib/Msft/Bing/Search.php';
//--------------------------------------------------


use Pimple\Container;

$container = new Container();

$container["google"] = function() {
    return new \SearchEngine\GoogleSearchEngine();
};
$container["yahoo"] = function() {
    return new SearchEngine\YahooSearchEngine();
};
$container["bing"] = function() {
    return new \SearchEngine\BingSearchEngine(new Msft_Bing_Search('MYnsjJ64'));
};
