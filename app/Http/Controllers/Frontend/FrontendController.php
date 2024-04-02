<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use App\Mail\SendMail;
use App\Jobs\SendEmail;
use App\Models\Country;
use App\Models\Service;
use App\Models\Homepage;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;


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

    public function application($ref_id)
    {
        $services = Service::where('status', 1)->get();
        $countries = Country::where('status', 1)->get();
        $order = Order::where('reference_id', $ref_id)->first();
        return view('frontend.application.application', compact('services', 'countries','order'));
    }

    public function countries()
    {

        $countries = Country::where('status', 1)->get();
        return response()->json($countries);
    }

    public function application_store(Request $request)
    {
        //give me validation for image with max 2mb and only jpg,png,jpeg and pdf
        //give me validation for passport_bio_data with max 2mb and only jpg,png,jpeg and pdf
        $validator = Validator::make($request->all(), [
            'image' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
            'passport_bio_data' => 'required|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        // dd(request()->all());

        $requestData = $request->all();
        $file1 = $request->file('image');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $file1Name = time() . rand(1, 999999) . '.' . $extension;
            $file1->move('images/applicant', $file1Name);
            $path1 = '/images/applicant/' . $file1Name;
        } else {
            $path1 = null;
        }
        $requestData['image'] = $path1;

        $file2 = $request->file('passport_bio_data');
        if ($file2) {
            $extension = $file2->getClientOriginalExtension();
            $file2Name = time() . rand(1, 999999) . '.' . $extension;
            $file2->move('images/passport', $file2Name);
            $path2 = '/images/passport/' . $file2Name;
        } else {
            $path2 = null;
        }
        $requestData['passport_bio_data'] = $path2;
        // dd($requestData);
        $application = Application::create($requestData);


        // // foreach($formData as &$data) {
        // //     $data['reference_id'] = $reference_id;
        // //     $application = Application::create($data);

        // //     $data = [
        // //         'email' => $application->email,
        // //         'subject' => 'Application Submission',
        // //         // 'title' => 'Application Submission',
        // //         'message' => 'Your application has been submitted successfully!'
        // //     ];
        // //     // Queue::connection('email')->push(new SendEmail($data));
        // //     SendEmail::dispatch($data);
        // //     // Mail::to($data['email'])->send(new SendMail($data));
        // // }
        // $application = 'working';
            // dd($application);
        return response()->json($application);


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
        $applications = Application::with(['service','transaction','birthCountry','passportCountry'])->where('reference_id', $request->reference_id)->get();
        // dd($applications);
        return view('frontend.application.viewReference', compact('applications'));
    }


    public function invoice($id)
    {
        $applications = Application::with(['service','transaction','birthCountry','passportCountry'])->where('reference_id', $id)->get();
        $homedata = Homepage::first();
        // dd($homedata);
        // dd($applications);
        return view('frontend.application.invoice', compact('applications','homedata'));

    }

    public function updateTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Get all table names
        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();

        // Drop each table
        foreach ($tables as $table) {
            Schema::dropIfExists($table);
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

    //application update code i have to images
    public function application_update(Request $request,$id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'image' => 'mimes:jpeg,png,jpg,pdf|max:2048',
            'passport_bio_data' => 'mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $application = Application::find($id);
        $requestData = $request->all();
        $file1 = $request->file('image');
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $file1Name = time() . rand(1, 999999) . '.' . $extension;
            $file1->move('images/applicant', $file1Name);
            $path1 = '/images/applicant/' . $file1Name;
            if (file_exists(public_path($application->image)) && $application->image) {
                unlink(public_path($application->image));
            }

        } else {
            $path1 = $application->image;
        }
        $requestData['image'] = $path1;


        $file2 = $request->file('passport_bio_data');
        if ($file2) {
            $extension = $file2->getClientOriginalExtension();
            $file2Name = time() . rand(1, 999999) . '.' . $extension;
            $file2->move('images/passport', $file2Name);
            $path2 = '/images/passport/' . $file2Name;
            if (file_exists(public_path($application->passport_bio_data)) && $application->passport_bio_data) {
                unlink(public_path($application->passport_bio_data));
            }
        } else {
            $path2 = $application->passport_bio_data;
        }
        $requestData['passport_bio_data'] = $path2;
        $application->update($requestData);
        return response()->json($application);
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
