<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Jobs\SendEmail;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::where('status', 1)->get();
        return view('frontend.home', compact('countries'));

    }

    //store code
    public function store(Request $request)
    {
        $request->validate([
            'citizen_country_id' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'count' => 'required',
        ]);

        $reference_id = $this->generateRefNumber();
        //add this reference_id to the request
        $request->request->add(['reference_id' => $reference_id]);

        $order = Order::create($request->all());

        return redirect()->route('application', $reference_id)
            ->with('success', 'Order created successfully.');
    }

    public function placed($id)
    {
        $order = Order::find($id);

        $data = [
            'email' => $order->email,
            'subject' => 'Application Submission',
            // 'title' => 'Application Submission',
            'message' => 'Your application has been submitted successfully!',
        ];
        // Queue::connection('email')->push(new SendEmail($data));
        SendEmail::dispatch($data);
        // Mail::to($data['email'])->send(new SendMail($data));

        return redirect()->route('view', $order->reference_id)
            ->with('success', 'Order created successfully.');
    }

    public function update(Request $request,$id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        // $data = [
        //     'email' => $order->email,
        //     'subject' => 'Application Submission',
        //     // 'title' => 'Application Submission',
        //     'message' => 'Your application has been submitted successfully!',
        // ];
        // // Queue::connection('email')->push(new SendEmail($data));
        // SendEmail::dispatch($data);
        // // Mail::to($data['email'])->send(new SendMail($data));

        return redirect()->back();
    }

    // private function generateRefNumber()
    // {
    //     $timestamp = now()->timestamp;
    //     $randomNumber = mt_rand(1000, 9999);
    //     $randomString = 'ETAVA';
    //     $ref_no = $randomString . $timestamp . $randomNumber;
    //     $ref_no = substr($ref_no, 0, 15);
    //     return $ref_no;
    // }
    private function generateRefNumber()
    {
        // Get current timestamp
        $timestamp = now()->timestamp;

        // Generate a random number
        $randomNumber = mt_rand(1000, 9999);

        // Unique identifier (you can use something more robust like UUID)
        $uniqueIdentifier = uniqid();

        // Concatenate the parts to form the reference number
        $ref_no = 'ETAVA' . $timestamp . $randomNumber . $uniqueIdentifier;

        // Trim if the length exceeds 15 characters
        $ref_no = substr($ref_no, 0, 15);

        return $ref_no;
    }

}
