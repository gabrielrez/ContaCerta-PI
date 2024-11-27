<?php

namespace App\Controllers;

use Hefestos\Core\Controller;

class TesteController extends Controller
{
    public function index()
    {
        return view('teste');
    }
}