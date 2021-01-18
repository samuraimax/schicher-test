<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function selecttent(){
        echo App::getLocale();
    }
}
