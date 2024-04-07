<?php

namespace App\Controllers;

use Cfw\Http\Response;

class FrontendController
{
    private Response $response;
    public function __construct()
    {
        $this->response = new Response();
    }

    public function index(): void
    {
        $this->response->setContent('<h1>Home</h1>');
        $this->response->send();
    }

    public function about(): void
    {
        $this->response->setContent('<h1>About</h1>');
        $this->response->send();
    }

    public function contact(): void
    {
        $this->response->setContent("
            <h1>Contact</h1>
            <script>
                let user = null;
                document.addEventListener('DOMContentLoaded', function() {
                    fetch('search?name=Christian&email=c@email.com')
                    .then(response => response.json())
                    .then((data) => {
                        user = data;
                        let h1 = document.createElement('h1');
                        h1.textContent = user.name;
                        document.body.appendChild(h1);
                        let p = document.createElement('p');
                        p.textContent = user.email;
                        document.body.appendChild(p);
                    })
                    .catch(error => console.error(error));
                });      
            </script>
        ");

        $this->response->send();
    }
}
