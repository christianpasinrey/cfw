<?php

namespace App\Controllers;

use Cfw\Http\Response;
use Cfw\Http\Request;

class ApiController
{
    public function getUser(int $id)
    {
        if ($id !== 1) {
            $response = new Response();
            $response->setContent('User not found');
            $response->send();
            return;
        }
        $user = array(
            'name' => 'John Doe',
            'email' => 'john.doe@example.net',
        );

        $response = new Response();
        return $response->json($user);
    }

    public function searchUser(Request $request)
    {
        $name = $request->params['name'];
        $email = $request->params['email'];

        $user = array(
            'name' => $name,
            'email' => $email,
        );

        $response = new Response();
        return $response->json($user);
    }
}
