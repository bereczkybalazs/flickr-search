<?php

namespace Tests\Unit\Handlers;

use App\Factories\FlickrFactory;
use App\Handlers\FlickrApiHandler;
use JeroenG\Flickr\Flickr;
use Tests\TestCase;

class FlickrApiHandlerTest extends TestCase
{
    const FAKE_KEYWORD = 'hello';

    /*
     * @test
     */
    public function test_has_no_response()
    {
        $flickr = $this->getMockByClass(Flickr::class);
        $flickr->expects($this->once())
            ->method('request')
            ->willReturnCallback(function () {
                $response = new \stdClass();
                $response->photos = new \stdClass();
                $response->photos->photo = [];
                return $response;
            });

        $flickrApiHandler = new FlickrApiHandler($this->getFlickrApiHandler($flickr));

        $response = $flickrApiHandler->searchByKeyword(self::FAKE_KEYWORD);

        $this->assertObjectHasAttribute('photos', $response);
        $this->assertObjectHasAttribute('photo', $response->photos);
        $this->assertEmpty($response->photos->photo);
    }

    /*
     * @test
     */
    public function test_has_response()
    {
        $flickr = $this->getMockByClass(Flickr::class);
        $flickr->expects($this->once())
            ->method('request')
            ->willReturnCallback(function () {
                $response = new \stdClass();
                $response->photos = new \stdClass();
                $response->photos->photo = [
                    ['hello']
                ];
                return $response;
            });

        $flickrApiHandler = new FlickrApiHandler($this->getFlickrApiHandler($flickr));

        $response = $flickrApiHandler->searchByKeyword(self::FAKE_KEYWORD);

        $this->assertObjectHasAttribute('photos', $response);
        $this->assertObjectHasAttribute('photo', $response->photos);
        $this->assertNotEmpty($response->photos->photo);
    }

    private function getFlickrApiHandler($flickr)
    {
        $flickrFactory = $this->getMockByClass(FlickrFactory::class);
        $flickrFactory->expects($this->once())
            ->method('getApi')
            ->willReturn($flickr);
        return $flickrFactory;
    }

    private function getMockByClass($class)
    {
        return $this->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
