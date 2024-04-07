<?php

namespace Cfw\Http;

use Cfw\Router\Router;
use Cfw\Http\Request;

class Kernel
{
    private Request $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    public function handle(Request $request): void
    {
        Router::dispatch($request);
    }
}
