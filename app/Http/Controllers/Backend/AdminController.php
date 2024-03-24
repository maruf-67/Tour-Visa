<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Service;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {

        $currentDate = Carbon::today();
        $todaysOrderCount = Application::whereDate('created_at', $currentDate->toDateString())->count();


        $lastWeekOrderCount = Application::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();


        $lastMonthOrderCount = Application::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $lastYearOrderCount = Application::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->count();

        $services = Service::withCount('applications')->with('applications')->where('status', 1)->get();


        return view('backend.index', compact('services', "todaysOrderCount", "lastWeekOrderCount", "lastMonthOrderCount",'lastYearOrderCount'));
    }
}
