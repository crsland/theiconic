<?php

require '../vendor/autoload.php';

require '../vendor/BingPHP/lib/Msft/Bing/Search.php'; //<--Fix this
//--------------------------------------------------


use Pimple\Container;

$container = new Container();

$container["google"] = function() {
    return new \App\Repos\SearchEngine\GoogleSearchEngine();
};
$container["yahoo"] = function() {
    return new \App\Repos\SearchEngine\YahooSearchEngine();
};
$container["gigablast"] = function() {
    return new \App\Repos\SearchEngine\GigaBlastSearchEngine();
};
$container["bing"] = function() {
    return new \App\Repos\SearchEngine\BingSearchEngine(new Msft_Bing_Search('MYnsjJ64'));
};