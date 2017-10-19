<?php

namespace AlbumTest\Action;

use Album\Action\AlbumListAction;
use Album\Action\AlbumListActionFactory;
use Album\Model\Repository\AlbumRepositoryInterface;
use Interop\Container\ContainerInterface;
use PHPUnit\Framework\TestCase;
use Zend\Expressive\Template\TemplateRendererInterface;

class AlbumListActionFactoryTest extends TestCase
{
    /** @var ContainerInterface */
    protected $container;

    /**
     * Setup test case
     */
    protected function setUp()
    {
        $this->container = $this->prophesize(ContainerInterface::class);
    }

    /**
     * Test if factory returns the correct action
     */
    public function testFactoryReturnsAlbumListAction()
    {
        $this->container
            ->get(TemplateRendererInterface::class)
            ->willReturn($this->prophesize(TemplateRendererInterface::class));

        $this->container
            ->get(AlbumRepositoryInterface::class)
            ->willReturn($this->prophesize(AlbumRepositoryInterface::class)->reveal());

        $factory = new AlbumListActionFactory();
        $this->assertInstanceOf(AlbumListActionFactory::class, $factory);

        $action = $factory($this->container->reveal());
        $this->assertInstanceOf(AlbumListAction::class, $action);
    }
}
