<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        return view ('frontend.index');
    }

    public function application(){

        return view ('frontend.application.application');
    }

    public function application_view(){

        return view ('frontend.application.view');
    }
}
