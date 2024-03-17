<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $services = Service::withCount('applications')->where('status',1)->get();
        return view('backend.index',compact('services'));
    }
}
