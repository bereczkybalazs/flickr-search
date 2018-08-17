<?php

namespace App\Http\Controllers;

use App\Contracts\Handlers\FlickrApiHandlerInterface;
use App\Http\Requests\FlickrSearchRequest;

class FlickrApiController extends Controller
{
    private $flickrApiHandler;

    public function __construct(FlickrApiHandlerInterface $flickrApiHandler)
    {
        $this->flickrApiHandler = $flickrApiHandler;
    }

    public function search(FlickrSearchRequest $request)
    {
        return response()->json(
            $this->flickrApiHandler->searchByKeyword(
                $request->query('q')
            )->photos['photo']
        );
    }
}
