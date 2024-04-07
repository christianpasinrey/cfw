<?php


$r->addRoute('GET', '/', 'App\Controllers\FrontendController@index');
$r->addRoute('GET', '/about', 'App\Controllers\FrontendController@about');
$r->addRoute('GET', '/contact', 'App\Controllers\FrontendController@contact');

$r->addRoute('GET', '/user/{id:\d+}', 'App\Controllers\ApiController@getUser');
$r->addRoute('GET', '/search', 'App\Controllers\ApiController@searchUser');
