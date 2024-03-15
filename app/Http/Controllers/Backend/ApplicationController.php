<?php

namespace App\Http\Controllers\Backend;

use App\Models\application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    // public function index()
    // {
    //     return view('backend.Application.approved.index');
    // }
    public function view()
    {
        return view('backend.Application.approved.view',compact('applications'));
    }
    public function onHold()
    {
        return view('backend.Application.onHold.index',compact('applications'));
    }
    public function paid()
    {
        $applications = Application::with('service', 'citizenCountry')->where('status', 1)->where('is_payment', 1)->get();
        return view('backend.Application.paid.index',compact('applications'));
    }
    public function processing()
    {
        $applications = Application::with('service', 'citizenCountry')->where('status', 2)->where('is_payment', 1)->get();
        // dd($application);
        return view('backend.Application.processing.index',compact('applications'));
    }
    public function rejected()
    {
        return view('backend.Application.rejected.index',compact('applications'));
    }
    public function unpaid()
    {
        $applications = Application::with('service', 'citizenCountry')->where('status', 1)->where('is_payment', 0)->get();
        return view('backend.Application.unpaid.index',compact('applications'));
    }

    public function create()
    {
        // Return view for creating a new application
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'dob' => 'required|date',
            'gender' => 'required|string|in:Male,Female,Other',
            'address' => 'nullable|string',
            'birth_country_id' => 'required|exists:countries,id',
            'citizen_country_id' => 'required|exists:countries,id',
            'details' => 'nullable|string',
            'passport_country_id' => 'required|exists:countries,id',
            'passport_number' => 'required|string',
            'passport_issue' => 'required|date',
            'passport_expiry' => 'required|date',
            'passport_image' => 'nullable|string',
            'intended_date' => 'required|date',
            'visa_image' => 'nullable|string',
            'is_war_crime' => 'boolean',
            'is_criminal_record' => 'boolean',
            'is_payment' => 'boolean',
            'is_refund' => 'boolean',
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'transaction_id' => 'required|exists:transactions,id',
            'status' => 'boolean',
        ]);

        $requestData = $request->all();
        $file1 = $request->file('passport_image');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $file1Name = time() . rand(1, 999999) . '.' . $extension;
            $file1->move('images/passports', $file1Name);
            $path1 = '/images/passports/' . $file1Name;
        } else {
            $path1 = null;
        }
        $requestData['passport_image'] = $path1;
        $application = Application::create($requestData);

        return redirect()->route('home')
                         ->with('success', 'Application created successfully');
    }

    public function edit(Application $application)
    {
        // Return view for editing an existing application
    }

    public function update(Request $request, string $id)
    {
        // $validatedData = $request->validate([
        //     'first_name' => 'required|string',
        //     'last_name' => 'required|string',
        //     'email' => 'required|email',
        //     // Add validation rules for other fields here
        // ]);
        $application = Application::findOrFail($id);
        $requestData = $request->all();
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

        return redirect()->route('home')
                         ->with('success', 'Application updated successfully');
    }

    public function destroy(string $id)
    {
        $application = Application::findOrFail($id);
        $application->delete();

        return redirect()->route('applications.index')
                         ->with('success', 'Application deleted successfully');
    }

}
