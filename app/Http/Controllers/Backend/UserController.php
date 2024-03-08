<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //give index page
    public function index()
    {
        $users = User::where('type', 'user')->get();
        return view('backend.setting.user.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.setting.user.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'image' => 'nullable|image|max:2048',
            'phone' => 'required|min:10',
            'password' => 'required|string|min:8',
            'type' => 'required',
        ]);

        $user = new User();
        $requestData = $request->all();
        // dd($requestData);
        $file = $request->image;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extension;
            $file->move('images/User/image', $fileName);
            $path = '/images/User/image/' . $fileName;

        } else {
            $path = null;
        }
        $requestData['image'] = $path;
        $requestData['password'] = bcrypt($request->password);

        $user->fill($requestData);
        $user->save();

        return redirect()->route('admin.user.adminUser')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        $user = User::find($id);
        $requestData = $request->all();
        $file = $request->image;
        if ($file) {
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . rand(1, 999999) . '.' . $extension;
            $file->move('images/User/image', $fileName);
            $path = '/images/User/image/' . $fileName;

            if (file_exists(public_path($user->image)) && $user->image) {
                unlink(public_path($user->image));
            }
        } else {
            $path = $user->image;
        }
        $requestData['image'] = $path;
        $user->update($requestData);

        return redirect()->route('admin.user.adminUser')->with('success', 'User updated successfully');
    }

    public function admin_user()
    {
        $users = User::where('type', '!=', 'user')->get();
        return view('backend.setting.user.admin-user', compact('users'));
    }

    public function admin_create()
    {
        // $user = User::find();
        return view('backend.setting.user.create');
    }

    public function changePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function change_password()
    {
        // $validator = Validator::make($request->all(), [
        //     'old_password' => 'required|min:8',
        //     'new_password' => 'required|min:8',
        //     'c_password' => 'required|same:new_password',
        // ]);

        // $user = User::find($id);
        return view('backend.setting.user.password');
    }



}
