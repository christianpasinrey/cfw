<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__) . '/');

$dotenv->load();

$request = Cfw\Http\Request::createFromGlobals();

$kernel = new Cfw\Http\Kernel();

$response = $kernel->handle($request);
