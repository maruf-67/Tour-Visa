<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        return view('backend.setting.country.index', compact('countries'));

    }

    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->update($request->all());
        $country->save();

        Alert::toast('Updated!', 'success');
        session()->flash('success', 'Country has been updated successfully !!');
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
        Alert::toast('Created!', 'success');
        return redirect()->route('admin.country.index');
    }

    public function destroy($id)
    {
        $Country = Country::find($id);
        $Country->delete();
        Alert::toast('Delete!', 'error');
        return redirect()->back();
    }

    public function status(Request $request, $id)
    {
        // dd($request->all());
        $country = Country::find($id);
        if (!$country) {
            return response()->json(['success' => false, 'message' => 'Country not found'], 404);
        }

        $country->status = $request->input('status');
        $country->save();

        return response()->json(['success' => true, 'status' => $country->status]);
    }

}
