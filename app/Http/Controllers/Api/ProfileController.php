<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Rules\ValidPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        //validate name and email field
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'old_password' => ['nullable', Rule::requiredIf($request->filled('new_password')), new ValidPassword],
            'new_password' => ['nullable', Rule::requiredIf($request->filled('old_password')), 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //save name and email
        $user           = auth()->user();
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        // if new password is present
        if($request->filled('new_password')) {
            $user->password = Hash::make($request->input('new_password'));
        }

        //photo upload
        if($request->hasFile('photo')) {
            $dynamicPath = 'user_' . $user->id . '/';
            $dynamicFileName = 'profile_' . uniqid();
            $photo_url = $this->storeFile($dynamicPath, $request->file('photo'), $dynamicFileName);
            if($user->photo) {
                $this->destroyFile($user->photo);
            }
            $user->photo = $photo_url;
        }

        $user->save();

        return response()->json(['status' => 'Successfully profile information saved!']);
    }
}
