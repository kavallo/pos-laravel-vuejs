<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(UpdateProfileRequest $request)
    {
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
