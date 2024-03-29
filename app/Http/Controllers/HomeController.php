<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Country;
use App\Models\Service;
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
        $countries = Country::where('status',1)->get();
        return view('frontend.home',compact('countries'));

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
                        ->with('success','Order created successfully.');
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
}
