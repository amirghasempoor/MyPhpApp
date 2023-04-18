<?php

function urlIs($value){
    return $_SERVER['REQUEST_URI'] === $value;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function abort($code = 404){
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)){
        require $routes[$uri];
    }
    else {
        abort();
    }
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}