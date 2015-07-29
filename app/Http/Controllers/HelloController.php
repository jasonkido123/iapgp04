<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    public function getIndex()
    {
        return view('welcome', $_GET);
    }

    public function postIndex(){
        echo 111111;
    }
}
