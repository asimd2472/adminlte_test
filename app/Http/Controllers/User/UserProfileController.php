<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {   
        $user_details = Auth::user();
        return view('user.profile.index', compact('user_details'));
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        $input = [];
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs('images', $fileName, 'public');
            $input['profile_image'] = $fileName;
        }

        $input['name'] = $request->name;
        $user = User::where('id', Auth::user()->id)->update($input);
        return redirect()->route('user.profile')
            ->with('success', 'Profile updated successfully.');
    }

    public function change_password(Request $request)
    {

        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $input['password'] = bcrypt($request->confirm_password);

        $user = User::where('id', Auth::user()->id)->update($input);

        if($user){
            return redirect()->back()->with('success', 'Password changed successfully');
        }else{
            return redirect()->back()->with('error', 'Something went wrong please try again after sometime');
        }

    }
}
