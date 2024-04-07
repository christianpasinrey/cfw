<?php

namespace Cfw\Http;

use Cfw\Router\Router;
use Cfw\Http\Request;
use Cfw\Http\Response;

class Kernel
{
    private Request $request;
    private Response $response;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
        $this->response = new Response();
    }

    public function handle(Request $request): void
    {
        Router::dispatch($request);
    }
}
