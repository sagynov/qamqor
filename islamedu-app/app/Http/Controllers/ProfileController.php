<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $profile = $user->profile;
        $roles = $user->roles;
        return view('profile', compact('user', 'profile', 'roles'));
    }
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile;
        return view('profile.edit', compact('user', 'profile'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'avatar' => 'nullable|image|max:2048',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone' => ['nullable', 'string', 'max:12'],
            'instagram' => ['nullable', 'string'],
            'facebook' => ['nullable', 'string'],
            'current_password' => ['nullable', 'string', 'min:8'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];
        $old_password = $request->input('current_password');
        // throw ValidationException::withMessages(['name' => 'This value is incorrect']);
        if($old_password){
            if(Hash::check($old_password, $user->password)) {
                $new_password = $request->input('password');
                if($new_password){
                    $data['password'] = $new_password;
                }
            }else{
                throw ValidationException::withMessages(['current_password' => __('Incorrect Password')]);
            }
        }
        $user->update($data);
        $profile_data = [];
        if($request->file('avatar')){
            $path = $request->file('avatar')->store('avatar', 'public');
            $profile_data['avatar'] = $path;
        }
        if($request->input('phone')){
            $profile_data['phone'] = $request->input('phone');
        }
        if($request->input('instagram')){
            $profile_data['instagram'] = $request->input('instagram');
        }
        if($request->input('facebook')){
            $profile_data['facebook'] = $request->input('facebook');
        }
        $user->profile()->update($profile_data);
        return back()->with('success', __('Data updated successfully'));
    }
}
