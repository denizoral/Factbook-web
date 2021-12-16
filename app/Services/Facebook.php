<?php

namespace App\Services;

class Facebook 
{
    private $apikey;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function facebookPost($text)
    {
        $newString = $text.$this->apikey;
    }
}