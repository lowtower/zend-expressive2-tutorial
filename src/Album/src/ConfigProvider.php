<?php

namespace Album;

/**
 * The configuration provider for the Album module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    /**
     * Returns the container dependencies
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            'invokables' => [
            ],
            'factories'  => [
                Action\AlbumListAction::class =>
                    Action\AlbumListActionFactory::class,
                Action\AlbumCreateFormAction::class =>
                    Action\AlbumCreateFormActionFactory::class,
                Action\AlbumCreateHandleAction::class =>
                    Action\AlbumCreateHandleActionFactory::class,

                Model\Repository\AlbumRepositoryInterface::class =>
                    Model\Repository\AlbumRepositoryFactory::class,

                Model\InputFilter\AlbumInputFilter::class =>
                    Model\InputFilter\AlbumInputFilterFactory::class,

                Model\Storage\AlbumStorageInterface::class =>
                    Db\AlbumTableGatewayFactory::class,

                Form\AlbumDataForm::class =>
                    Form\AlbumDataFormFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'album' => [__DIR__ . '/../templates/album'],
            ],
        ];
    }
}
