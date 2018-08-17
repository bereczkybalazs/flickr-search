<?php

namespace App\Contracts\Handlers;

interface FlickrApiHandlerInterface
{
    public function searchByKeyword($keyword);
}