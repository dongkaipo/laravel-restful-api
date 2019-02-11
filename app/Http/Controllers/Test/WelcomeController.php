<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function welcome()
    {
        return $this->response->array([
            'success' => true,
            'message' => 'Hello Laravel RESTful Api'
        ]);
    }

}
