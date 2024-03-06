<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('backend.service.index',compact('services'));

    }


    public function create()
    {
        return view('backend.service.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);

        $service = Service::create($validatedData);
        return redirect()->route('admin.service.index');
    }

    public function edit($id){
        $service = Service::find($id);
        return view('backend.service.edit',compact('service'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'time' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
        ]);
        $service = Service::find($id);
        $service->update($validatedData);
        $service->save();

        session()->flash('success','Service has been updated successfully !!');
        return redirect()->route('admin.service.index');

    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
    }

}
