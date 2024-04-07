<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';


$request = Cfw\Http\Request::createFromGlobals();

$kernel = new Cfw\Http\Kernel();

$response = $kernel->handle($request);
