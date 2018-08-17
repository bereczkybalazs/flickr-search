<?php

namespace App\Factories;

use App\Contracts\Factories\FlickrFactoryInterface;
use JeroenG\Flickr\Api;
use JeroenG\Flickr\Flickr;

class FlickrFactory implements FlickrFactoryInterface
{
    public static function getApi() {

        $apiKey = env('FLICKR_KEY');
        $apiFormat = 'php_serial';

        return new Flickr(new Api($apiKey, $apiFormat));
    }
}