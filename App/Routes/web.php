<?php

namespace App\Routes;

use Bramus\Router\Router;
class web
{
    public $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function defineRoutes()
    {
        $this->router->get('/', '\App\Controllers\ProductController@index');
        $this->router->get('/products', '\App\Controllers\ProductController@index');
        $this->router->get('/addproduct', '\App\Controllers\ProductController@create');
        $this->router->post('/addproduct', '\App\Controllers\ProductController@store');
        $this->router->post('/deleteproduct', '\App\Controllers\ProductController@delete');
        $this->router->run();
    }
}
