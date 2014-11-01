<?php

namespace App\Repos\SearchEngine;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
interface SearchEngineRepository
{
    public function search($query);
}
