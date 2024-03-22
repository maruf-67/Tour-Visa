<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Country;
use App\Models\Service;
use App\Models\Homepage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function view($reference_id)
    {
        $sum = 0;
        $applications = Application::with(['service'])->where('reference_id', $reference_id)->get();
                foreach($applications as $application) {
                    $sum += $application->service->price;
        }
        return view('frontend.application.application_view', compact('applications', 'sum', 'reference_id'));
    }

    public function application()
    {


        $services = Service::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        return view('frontend.application.application', compact('services', 'countries'));
    }

    public function countries()
    {

        $countries = Country::where('status', 1)->get();
        return response()->json($countries);
    }

    public function application_store(Request $request)
    {

        $formData = json_decode($request->getContent(), true);
        $reference_id = $this->generateRefNumber();
        // dd(request()->all(), $formData, $reference_id);


        foreach($formData as &$data) {
            $data['reference_id'] = $reference_id;
            $application = Application::create($data);
        }

        // $sum = 0;
        // $applications = Application::with(['service'])->where('reference_id', $reference_id)->get();
        //         foreach($applications as $application) {
        //             $sum += $application->amount;
        // }

        return response()->json(['reference_id' => $reference_id]);
        // return view('frontend.application.application_view', compact('applications', 'sum', 'reference_id'));
        // return redirect()->route('view')->with('success', 'Application created successfully');

        // return redirect()->route('view',compact('applications', 'sum', 'reference_id') )->with('success', 'Application created successfully');

    }

    public function application_view()
    {

        return view('frontend.application.view');
    }

    private function generateRefNumber()
    {
        $timestamp = now()->timestamp;
        $randomNumber = mt_rand(1000, 9999);
        $randomString = 'ETAVA';
        $ref_no = $randomString . $timestamp . $randomNumber;
        $ref_no = substr($ref_no, 0, 15);
        return $ref_no;
    }
    public function viewReference(Request $request)
    {
        // dd($request->reference_id);
        $applications = Application::with(['service','transaction','birthCountry','citizenCountry','passportCountry'])->where('reference_id', $request->reference_id)->get();
        // dd($applications);
        return view('frontend.application.viewReference', compact('applications'));
    }


    public function invoice($id)
    {
        $applications = Application::with(['service','transaction','birthCountry','citizenCountry','passportCountry'])->where('reference_id', $id)->get();
        $homedata = Homepage::first();
        // dd($homedata);
        dd($applications);
        return view('frontend.application.invoice', compact('applications','homedata'));

    }
}

// $validatedData = $request->validate([
//     'first_name' => 'required|string',
//     'last_name' => 'required|string',
//     'email' => 'required|email',
//     'phone' => 'required|string',
//     'dob' => 'required|date',
//     'gender' => 'required|string|in:Male,Female,Other',
//     'address' => 'nullable|string',
//     'birth_country_id' => 'required|exists:countries,id',
//     'citizen_country_id' => 'required|exists:countries,id',
//     'details' => 'nullable|string',
//     'passport_country_id' => 'required|exists:countries,id',
//     'passport_number' => 'required|string',
//     'passport_issue' => 'required|date',
//     'passport_expiry' => 'required|date',
//     'passport_image' => 'nullable|string',
//     'intended_date' => 'required|date',
//     'visa_image' => 'nullable|string',
//     'is_war_crime' => 'boolean',
//     'is_criminal_record' => 'boolean',
//     'is_payment' => 'boolean',
//     'is_refund' => 'boolean',
//     'service_id' => 'required|exists:services,id',
//     // 'user_id' => 'required|exists:users,id',
//     // 'transaction_id' => 'required|exists:transactions,id',
//     'status' => 'boolean',
// ]);

// $file1 = $request->file('passport_image');
// if ($file1) {
//     $extension = $file1->getClientOriginalExtension();
//     $file1Name = time() . rand(1, 999999) . '.' . $extension;
//     $file1->move('images/passports', $file1Name);
//     $path1 = '/images/passports/' . $file1Name;
// } else {
//     $path1 = null;
// }
// $requestData['passport_image'] = $path1;
// // $requestData['user_id'] = auth()->user()->id;
