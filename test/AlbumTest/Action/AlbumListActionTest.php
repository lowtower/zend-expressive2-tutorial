<?php

namespace AlbumTest\Action;

use Album\Action\AlbumListAction;
use Interop\Http\ServerMiddleware\DelegateInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
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
        $renderer
            ->render('album::list', Argument::type('array'))
            ->shouldBeCalled()
            ->willReturn('BODY');

        $action = new AlbumListAction($renderer->reveal());

        $response = $action->process(
            $this->prophesize(ServerRequestInterface::class)->reveal(),
            $this->prophesize(DelegateInterface::class)->reveal()
        );

        $this->assertInstanceOf(HtmlResponse::class, $response);
        $this->assertEquals('BODY', $response->getBody());
    }
}
