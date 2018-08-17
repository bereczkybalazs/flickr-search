<?php

namespace App\Handlers;

use App\Contracts\Factories\FlickrFactoryInterface;
use App\Contracts\Handlers\FlickrApiHandlerInterface;

class FlickrApiHandler implements FlickrApiHandlerInterface
{
    private $flickrFactory;

    public function __construct(FlickrFactoryInterface $flickrFactory)
    {
        $this->flickrFactory = $flickrFactory;
    }

    public function searchByKeyword($keyword)
    {
        return $this->flickrFactory->getApi()->request(
            'flickr.photos.search',
            ['text' => $keyword, 'extras' => 'url_m,url_l']
        );
    }
}