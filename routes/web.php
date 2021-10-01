<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});


// user api
$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');

// client api
$router->get('/client/index', 'ClientController@index');
$router->put('/client/update', 'ClientController@update');
$router->get('/client/product_wishlist', 'ClientController@product_wishlist');
$router->get('/client/vendor_wishlist', 'ClientController@vendor_wishlist');
$router->get('/client/order', 'ClientController@order');
$router->post('/client/addreview={id}', 'ClientController@addreview');
$router->post('/client/addProductWishlist={id}', 'ClientController@addProductWishlist');
$router->post('/client/addVendorWishlist={id}', 'ClientController@addVendorWishlist');
$router->delete('/client/deleteProductWishlist={id}', 'ClientController@deleteProductWishlist');
$router->delete('/client/deleteVendorWishlist={id}', 'ClientController@deleteVendorWishlist');

//home api
$router->get('/home/index', 'HomeController@index');
$router->get('/home/category={id}', 'HomeController@category');
$router->get('/home/vendor={id}', 'HomeController@vendor');
$router->get('/home/product={id}', 'HomeController@product');
$router->post('/home/order={id}', 'HomeController@order');
$router->get('/home/allproduct={id}', 'HomeController@allproduct');
$router->get('/home/review={id}', 'HomeController@review');
