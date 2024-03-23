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


        $lastWeekOrderCount = Application::whereBetween('created_at', [$currentDate->copy()->subWeek()->startOfWeek(), $currentDate->copy()->subWeek()->endOfWeek()])->count();


        $lastMonthOrderCount = Application::whereYear('created_at', $currentDate->year)
            ->whereMonth('created_at', $currentDate->subMonth()->month)
            ->count();

        $services = Service::withCount('applications')->with('applications')->where('status', 1)->get();

        // dd($todays);
        return view('backend.index', compact('services', "todaysOrderCount", "lastMonthOrderCount", "lastMonthOrderCount"));
    }
}
