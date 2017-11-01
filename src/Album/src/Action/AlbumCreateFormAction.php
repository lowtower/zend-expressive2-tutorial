<?php
namespace Album\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;
use Album\Form\AlbumDataForm;

/**
 * Class AlbumCreateFormAction
 *
 * @package Album\Action
 */
class AlbumCreateFormAction implements ServerMiddlewareInterface
{
    /**
     * @var TemplateRendererInterface
     */
    private $template;

    /**
     * @var AlbumDataForm
     */
    private $albumForm;

    /**
     * AlbumCreateFormAction constructor.
     *
     * @param TemplateRendererInterface $template
     * @param AlbumDataForm             $albumForm
     */
    public function __construct(
        TemplateRendererInterface $template,
        AlbumDataForm $albumForm
    ) {
        $this->template  = $template;
        $this->albumForm = $albumForm;
    }

    /**
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate) {
        if ($this->albumForm->getMessages()) {
            $message = 'Please check your input!';
        } else {
            $message = 'Please enter the new album!';
        }

        $data = [
            'albumForm' => $this->albumForm,
            'message'   => $message,
        ];

        return new HtmlResponse(
            $this->template->render('album::create', $data)
        );
    }
}
