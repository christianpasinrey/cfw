<?php

namespace Cfw\Router;

use Cfw\Http\Request;
use FastRoute\RouteCollector;
//inject the RouteCollector to the RouteDispatcher
class Router
{
    //Wee need to use the RouteCollector to define the routes of /routes.php
    public static function dispatch(Request $request): void
    {
        $dispatcher = \FastRoute\simpleDispatcher(function (RouteCollector $r) {
            require_once __DIR__ . '/../../src/routes/web.php';
        });
        $uri = $request->uri;
        // Strip query string (?foo=bar) and decode URI
        if (false !== $pos = strpos($request->uri, '?')) {
            $uri = substr($request->uri, 0, $pos);
        }
        $uri_decoded = rawurldecode($uri);

        $routeInfo = $dispatcher->dispatch($request->method, $uri_decoded);

        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                echo '404 - Not Found';
                break;
            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                echo '405 - Method Not Allowed';
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = implode(',', $routeInfo[2]);
                [$controller, $method] = explode('@', $handler);
                $controller = new $controller;
                if (!empty($request->params)) {
                    $controller->$method($request);
                    break;
                }
                $controller->$method($vars);
                break;
        }
    }
}
