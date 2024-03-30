<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Country;
use App\Models\Service;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    // public function index()
    // {
    //     return view('backend.Application.approved.index');
    // }
    public function view(string $id)
    {
        $services = Service::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $application = Application::with('service', 'order')->find($id);
        return view('backend.Application.view',compact('application', 'services', 'countries'));
    }
    public function approved()
    {
        $applications = Application::with('service', 'order')->where('status', 3)->where('is_payment', 1)->get();
        return view('backend.Application.approved.index',compact('applications'));
    }
    public function onHold()
    {
        $applications = Application::with('service', 'order')->where('status', 4)->get();
        return view('backend.Application.onHold.index',compact('applications'));
    }
    public function paid()
    {
        $applications = Application::with('service', 'order')->where('is_payment', 1)->get();
        return view('backend.Application.paid.index',compact('applications'));
    }
    public function processing()
    {
        $applications = Application::with('service', 'order')->where('status', 2)->where('is_payment', 1)->get();
        // dd($application);
        return view('backend.Application.processing.index',compact('applications'));
    }
    public function rejected()
    {
        $applications = Application::with('service', 'order')->where('status', 5)->get();
        // dd($applications);
        return view('backend.Application.rejected.index',compact('applications'));
    }
    public function unpaid()
    {
        $applications = Application::with('service', 'order')->where('is_payment', 0)->get();
        return view('backend.Application.unpaid.index',compact('applications'));
    }
    public function today()
    {
        $currentDate = Carbon::today();

        $applications = Application::with('service', 'order')->whereDate('created_at', $currentDate)->get();
        return view('backend.Filters.today.index',compact('applications'));
    }

    public function last_week()
    {
        $oneWeekAgo = Carbon::today()->subWeek();

        $applications =Application::with('service', 'order')
        ->whereDate('created_at', '>=', $oneWeekAgo)
        ->get();
        return view('backend.Filters.last-week.index',compact('applications'));
    }

    public function last_month()
    {
        $oneMonthAgo = Carbon::today()->subMonth();

        $applications =Application::with('service', 'order')
        ->whereDate('created_at', '>=', $oneMonthAgo)
        ->get();
        return view('backend.Filters.last-month.index',compact('applications'));
    }

    public function last_year()
    {
        $oneMonthAgo = Carbon::today()->subYear();

        $applications =Application::with('service', 'order')
        ->whereDate('created_at', '>=', $oneMonthAgo)
        ->get();
        return view('backend.Filters.last-year.index',compact('applications'));
    }

    public function report(Request $request)
    {

        // if null get all data using latest
        $start_date = ($request->has('start_date')) ? $request->start_date : Carbon::today()->subMonth();
        // if null get all data using latest
        $end_date = ($request->has('end_date')) ? $request->end_date : Carbon::today();

        $applications= Application::with('service', 'order')
                                ->whereBetween('created_at', [$start_date, $end_date])
                                ->latest()
                                ->get();
        return view('backend.Filters.filter',compact('applications', 'start_date', 'end_date'));
    }


    public function create()
    {
        // Return view for creating a new application
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'first_name' => 'required|string',
    //         'last_name' => 'required|string',
    //         'email' => 'required|email',
    //         'phone' => 'required|string',
    //         'dob' => 'required|date',
    //         'gender' => 'required|string|in:Male,Female,Other',
    //         'address' => 'nullable|string',
    //         'birth_country_id' => 'required|exists:countries,id',
    //         'citizen_country_id' => 'required|exists:countries,id',
    //         'details' => 'nullable|string',
    //         'passport_country_id' => 'required|exists:countries,id',
    //         'passport_number' => 'required|string',
    //         'passport_issue' => 'required|date',
    //         'passport_expiry' => 'required|date',
    //         'passport_image' => 'nullable|string',
    //         'intended_date' => 'required|date',
    //         'visa_image' => 'nullable|string',
    //         'is_war_crime' => 'boolean',
    //         'is_criminal_record' => 'boolean',
    //         'is_payment' => 'boolean',
    //         'is_refund' => 'boolean',
    //         'service_id' => 'required|exists:services,id',
    //         'user_id' => 'required|exists:users,id',
    //         'transaction_id' => 'required|exists:transactions,id',
    //         'status' => 'boolean',
    //     ]);

    //     $requestData = $request->all();
    //     $file1 = $request->file('passport_image');
    //     if ($file1) {
    //         $extension = $file1->getClientOriginalExtension();
    //         $file1Name = time() . rand(1, 999999) . '.' . $extension;
    //         $file1->move('images/passports', $file1Name);
    //         $path1 = '/images/passports/' . $file1Name;
    //     } else {
    //         $path1 = null;
    //     }
    //     $requestData['passport_image'] = $path1;
    //     $application = Application::create($requestData);

    //     return redirect()->route('home')
    //                      ->with('success', 'Application created successfully');
    // }

    public function edit(Application $application)
    {
        // Return view for editing an existing application
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'visa_image' => 'nullable|image|max:2048',
            // Add validation rules for other fields here
        ]);

        $application = Application::findOrFail($id);
        $requestData = $request->all();
        // dd($requestData);

        $file1 = $request->file('passport_image');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $file1Name = time() . rand(1, 999999) . '.' . $extension;
            $file1->move('images/passports', $file1Name);
            $path1 = '/images/passports/' . $file1Name;
            if (file_exists(public_path($application->passport_image)) && $application->passport_image) {
                unlink(public_path($application->passport_image));
            }
        } else {
            $path1 = $application->passport_image;
        }
        $requestData['passport_image'] = $path1;

        $file2 = $request->file('visa_image');
        if ($file2) {
            $extension = $file2->getClientOriginalExtension();
            $file2Name = time() . rand(1, 999999) . '.' . $extension;
            $file2->move('images/visa', $file2Name);
            $path2 = '/images/visa/' . $file2Name;
            if (file_exists(public_path($application->visa_image)) && $application->visa_image) {
                unlink(public_path($application->visa_image));
            }
        } else {
            $path2 = $application->visa_image;
        }
        $requestData['visa_image'] = $path2;



        $application->update($requestData);
        if($application->status == 3 && $application->is_payment == 1){
            return redirect()->route('mail.approved',$application->id);
        }

        return redirect()->back()
                         ->with('success', 'Application updated successfully');
    }

    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->back()
                         ->with('success', 'Application deleted successfully');
    }

}
