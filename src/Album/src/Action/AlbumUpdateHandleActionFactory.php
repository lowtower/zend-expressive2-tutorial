<?php

namespace Album\Action;

use Album\Form\AlbumDataForm;
use Album\Model\Repository\AlbumRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Expressive\Router\RouterInterface;

class AlbumUpdateHandleActionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return AlbumUpdateHandleAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AlbumUpdateHandleAction(
            $container->get(RouterInterface::class),
            $container->get(AlbumRepositoryInterface::class),
            $container->get(AlbumDataForm::class)
        );
    }
}
