<?php

namespace App\Http\Controllers;

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
        $admin           = auth()->user();
        $admin->name     = $request->input('name');
        $admin->email    = $request->input('email');
        // if new password is present
        if($request->filled('new_password')) {
            $admin->password = Hash::make($request->input('new_password'));
        }

        //photo upload
        if($request->hasFile('photo')) {
            $dynamicPath = 'admin_' . $admin->id . '/';
            $dynamicFileName = 'profile_' . uniqid();
            $photo_url = $this->storeFile($dynamicPath, $request->file('photo'), $dynamicFileName);
            if($admin->photo) {
                $this->destroyFile($admin->photo);
            }
            $admin->photo = $photo_url;
        }

        $admin->save();

        return response()->json(['status' => 'Successfully profile information saved!']);
    }
}
