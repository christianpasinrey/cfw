<?php

namespace App\Controllers;

use Cfw\Http\Response;
use Cfw\Html\Page;

class FrontendController
{
    private Response $response;
    public function __construct()
    {
        $this->response = new Response();
    }

    public function index(): void
    {
        $this->response->setContent(Page::render('index'));
        $this->response->send();
    }

    public function about(): void
    {
        $this->response->setContent(Page::render('about'));
        $this->response->send();
    }

    public function contact(): void
    {
        $this->response->setContent(Page::render('contact'));

        $this->response->send();
    }
}
