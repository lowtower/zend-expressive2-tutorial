<?php

namespace Album\Action;

use Album\Form\AlbumDeleteForm;
use Album\Model\Repository\AlbumRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AlbumDeleteFormActionFactory
 *
 * @package Album\Action
 */
class AlbumDeleteFormActionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return AlbumDeleteFormAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AlbumDeleteFormAction(
            $container->get(TemplateRendererInterface::class),
            $container->get(AlbumRepositoryInterface::class),
            $container->get(AlbumDeleteForm::class)
        );
    }
}
