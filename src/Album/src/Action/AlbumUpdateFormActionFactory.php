<?php

namespace Album\Action;

use Album\Form\AlbumDataForm;
use Album\Model\Repository\AlbumRepositoryInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class AlbumUpdateFormActionFactory
 *
 * @package Album\Action
 */
class AlbumUpdateFormActionFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param null|array $options
     * @return AlbumUpdateFormAction
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AlbumUpdateFormAction(
            $container->get(TemplateRendererInterface::class),
            $container->get(AlbumRepositoryInterface::class),
            $container->get(AlbumDataForm::class)
        );
    }
}
