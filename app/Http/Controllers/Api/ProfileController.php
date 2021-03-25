<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        //save name and email
        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        
        //if user want to change password
        if (!is_null($request->old_password)) {
            //validate password
            $validator = Validator::make($request->all(), [
                'old_password' => 'required|min:8',
                'new_password' => 'required|confirmed|min:8',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            //save user password
            if (Hash::check($request->old_password, auth()->user()->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                return response()->json(['errors' => ['old_password' => 'Old password did not match.']], 422);
            }
        }

        //photo upload
        if($request->photo) {
            $dynamicPath = 'user_' . $user->id . '/';
            $dynamicFileName = 'profile_' . uniqid();
            $photo_url = $this->storeFile($dynamicPath, $request->photo, $dynamicFileName);
            if($user->photo) {
                $this->destroyFile($user->photo);
            }
            $user->photo = $photo_url;
        }

        $user->save();

        return response()->json(['status' => 'Successfully profile information saved!']);
    }
}
