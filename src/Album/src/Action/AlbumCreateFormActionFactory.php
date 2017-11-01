<?php
namespace Album\Action;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Album\Form\AlbumDataForm;

/**
 * Class AlbumCreateFormActionFactory
 *
 * @package Album\Action
 */
class AlbumCreateFormActionFactory
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumCreateFormAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $template  = $container->get(TemplateRendererInterface::class);
        $albumForm = $container->get(AlbumDataForm::class);

        return new AlbumCreateFormAction(
            $template, $albumForm
        );
    }
}
