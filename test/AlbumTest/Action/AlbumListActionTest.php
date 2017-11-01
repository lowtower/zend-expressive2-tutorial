<?php

namespace AlbumTest\Action;

use Album\Action\AlbumListAction;
use Album\Model\Repository\AlbumRepositoryInterface;
use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class AlbumListActionTest extends TestCase
{
    /**
     * Test if action renders the album list
     */
    public function testActionRendersAlbumListTemplate()
    {
        $renderer = $this->prophesize(TemplateRendererInterface::class);
        $renderer->render(
            'album::list',
            ['albumList' => ['album1', 'album2']]
        )
             ->shouldBeCalled()
            ->willReturn('BODY');

        $albumRepository = $this->prophesize(
            AlbumRepositoryInterface::class
        );
        $albumRepository->fetchAllAlbums()->shouldBeCalled()->willReturn([
            'album1',
            'album2'
        ]);

        $action = new AlbumListAction(
            $renderer->reveal(),
            $albumRepository->reveal()
        );

        $response = $action->process(
            $this->prophesize(ServerRequestInterface::class)->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );

        $this->assertInstanceOf(HtmlResponse::class, $response);
        $this->assertEquals('BODY', $response->getBody());
    }
}
