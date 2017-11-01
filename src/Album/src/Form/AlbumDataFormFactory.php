<?php
namespace Album\Form;

use Interop\Container\ContainerInterface;
use Zend\Form\Form;
use Zend\Hydrator\ArraySerializable;
use Album\Model\InputFilter\AlbumInputFilter;

/**
 * Class AlbumDataFormFactory
 *
 * @package Album\Form
 */
class AlbumDataFormFactory extends Form
{
    /**
     * @param ContainerInterface $container
     *
     * @return AlbumDataForm
     */
    public function __invoke(ContainerInterface $container)
    {
        $hydrator    = new ArraySerializable();
        $inputFilter = $container->get(AlbumInputFilter::class);

        $form = new AlbumDataForm();
        $form->setHydrator($hydrator);
        $form->setInputFilter($inputFilter);
        $form->init();

        return $form;
    }
}
