<?php

namespace Tests\Unit\Handlers;

use App\Handlers\FlickrApiHandler;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FlickrApiHandlerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $flickrApiHandler = $this->getApiHandlerMock();
        $this->assertNotNull($flickrApiHandler);
    }

    private function getApiHandlerMock()
    {
        return $this->getMockBuilder(FlickrApiHandler::class)
            ->disableOriginalConstructor()
            ->getMock();
    }
}
