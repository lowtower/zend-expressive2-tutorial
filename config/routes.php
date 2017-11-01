<?php
/**
 * Setup routes with a single request method:
 *
 * $app->get('/', App\Action\HomePageAction::class, 'home');
 * $app->post('/album', App\Action\AlbumCreateAction::class, 'album.create');
 * $app->put('/album/:id', App\Action\AlbumUpdateAction::class, 'album.put');
 * $app->patch('/album/:id', App\Action\AlbumUpdateAction::class, 'album.patch');
 * $app->delete('/album/:id', App\Action\AlbumDeleteAction::class, 'album.delete');
 *
 * Or with multiple request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class, ['GET', 'POST', ...], 'contact');
 *
 * Or handling all request methods:
 *
 * $app->route('/contact', App\Action\ContactAction::class)->setName('contact');
 *
 * or:
 *
 * $app->route(
 *     '/contact',
 *     App\Action\ContactAction::class,
 *     Zend\Expressive\Router\Route::HTTP_METHOD_ANY,
 *     'contact'
 * );
 */

$app->get('/', App\Action\HomePageAction::class, 'home');
$app->get('/api/ping', App\Action\PingAction::class, 'api.ping');

$app->get('/album', Album\Action\AlbumListAction::class, 'album');
$app->get('/album/create', Album\Action\AlbumCreateFormAction::class, 'album-create');
$app->post('/album/create/handle',[
    Album\Action\AlbumCreateHandleAction::class,
    Album\Action\AlbumCreateFormAction::class,
], 'album-create-handle');
$app->get("/album/update/{id:\d+}", [
    Album\Action\AlbumUpdateFormAction::class,
], 'album-update');
$app->post("/album/update/{id:\d+}/handle", [
    Album\Action\AlbumUpdateHandleAction::class,
    Album\Action\AlbumUpdateFormAction::class,
], 'album-update-handle');
$app->get("/album/delete/{id:\d+}", [
    Album\Action\AlbumDeleteFormAction::class,
], 'album-delete');
$app->post("/album/delete/{id:\d+}/handle", [
    Album\Action\AlbumDeleteHandleAction::class,
    Album\Action\AlbumDeleteFormAction::class,
], 'album-delete-handle');
