<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        return view('backend.setting.country.index',compact('countries'));

    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->update($request->all());
        $country->save();

        session()->flash('success','Country has been updated successfully !!');
        return redirect()->route('admin.country.index');

    }

    public function create()
    {
        return view('backend.setting.country.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'iso' => 'required',
            'name' => 'required',
            'nicename' => 'required',
            'iso3' => 'required',
            'numcode' => 'required',
            'phonecode' => 'required',
            'status' => 'required',
        ]);

        $country = Country::create($validatedData);
        return redirect()->route('admin.country.index');
    }

}
