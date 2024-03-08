<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        return view('backend.Application.approved.index');
    }
    public function view()
    {
        return view('backend.Application.approved.view');
    }
    public function onHold()
    {
        return view('backend.Application.onHold.index');
    }
    public function paid()
    {
        return view('backend.Application.paid.index');
    }
    public function processing()
    {
        return view('backend.Application.processing.index');
    }
    public function rejected()
    {
        return view('backend.Application.rejected.index');
    }
    public function unpaid()
    {
        return view('backend.Application.unpaid.index');
    }

}
