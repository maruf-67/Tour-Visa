<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

        $currentDate = Carbon::today();
        $todays = Application::withCount('service', 'citizenCountry')->whereDate('created_at', $currentDate)->get();

        $services = Service::withCount('applications')->where('status',1)->get();

        // dd($todays);
        return view('backend.index',compact('services',"todays"));
    }
}
