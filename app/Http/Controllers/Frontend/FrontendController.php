<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\Application;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class FrontendController extends Controller
{
    public function index(){

        return view('backend.Application.approved.index');
    }

    public function application(){

        $services = Service::where('status',1)->get();
        $countries = Country::where('status',1)->get();
        return view ('frontend.application.application',compact('services', 'countries'));
    }

    public function countries(){

        $countries = Country::where('status',1)->get();
        return response()->json($countries);
    }

    public function application_store(Request $request)
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
            // 'user_id' => 'required|exists:users,id',
            // 'transaction_id' => 'required|exists:transactions,id',
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
        $requestData['user_id'] = auth()->user()->id;
        $application = Application::create($requestData);

        return redirect()->route('home')
                         ->with('success', 'Application created successfully');
    }

    public function application_view(){

        return view ('frontend.application.view');
    }

    private function generateOrderNumber()
    {
        $timestamp = now()->timestamp;
        $randomNumber = mt_rand(1000, 9999);
        $randomString = Str::random(6);
        $orderNumber = $timestamp . $randomNumber . $randomString;
        $orderNumber = substr($orderNumber, 0, 12);
        return $orderNumber;
    }
}
