<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/controllers/dashboard' => 'controllers/dashboard.php',
    '/admin/books' => 'controllers/admin/books/allbooks.php',
    '/admin/books/addbook' => 'controllers/admin/books/addbook.php',
    '/admin/books/updatebook' => 'controllers/admin/books/updatebook.php',
    '/admin/books/deletebook' => 'controllers/admin/books/deletebook.php',
    '/admin/users' =>       'controllers/admin/deleteuser.php',
    '/admin/users' =>       'controllers/admin/deleteuser.php',
    '/admin/category' => 'controllers/admin/addbook.php',
    '/admin/updatebook' => 'controllers/admin/updatebook.php',
    '/admin/deletebook' => 'controllers/admin/deletebook.php',
    
];

function routeToController($uri, $routes){
    
if(array_key_exists($uri, $routes)){
    require $routes[$uri];

}else{
    abort();
}
}

function abort($code = 404){
    http_response_code($code);

    require 'views/{code}.php';
    die();
}
routeToController($uri, $routes);

?>