<?php

namespace App\Http\Controllers\Backend;

use App\Models\Homepage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SettingController extends Controller
{
    public function index()
    {
        $data = Homepage::first();
        return view('backend.setting.basic.index',compact('data'));
    }

    public function store(Request $request)
    {
        $data = Homepage::first();

        $requestData = $request->all();
        $file1 = $request->fav_icon;
        if ($file1) {
            $extension = $file1->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extension;
            $file1->move('images/Homepage/fav_icon', $fileName);
            $path1 = '/images/Homepage/fav_icon/' . $fileName;

            if (file_exists(public_path($data->fav_icon)) && $data->fav_icon) {
                unlink(public_path($data->fav_icon));
            }
        } else {
            $path1 = $data->fav_icon;;
        }
        $requestData['fav_icon'] = $path1;

        $file2 = $request->logo;
        if ($file2) {
            $extension = $file2->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extension;
            $file2->move('images/Homepage/logo', $fileName);
            $path2 = '/images/Homepage/logo/' . $fileName;

            if (file_exists(public_path($data->logo)) && $data->logo) {
                unlink(public_path($data->logo));
            }
        } else {
            $path2 = $data->logo;
        }
        $requestData['logo'] = $path2;

        $data->update($requestData);

        Alert::toast('Updated!', 'success');

        return redirect()->back()->with('success', 'Homepage updated successfully');
    }

}
