<?php
namespace Album\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Album\Form\AlbumDataForm;
use Album\Model\Repository\AlbumRepositoryInterface;

/**
 * Class AlbumCreateHandleActionFactory
 *
 * @package Album\Action
 */
class AlbumCreateHandleActionFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumCreateHandleAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $router          = $container->get(RouterInterface::class);
        $albumRepository = $container->get(AlbumRepositoryInterface::class);
        $albumForm       = $container->get(AlbumDataForm::class);

        return new AlbumCreateHandleAction($router, $albumRepository, $albumForm);
    }
}
