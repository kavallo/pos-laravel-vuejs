<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ResetPasswordNotification;

class ForgetPasswordController extends Controller
{
    /**
     * custom url to redirect from email message link
     */
    public $url;

    public function forgetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'url'   => 'required|url'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $this->url = $request->url;
        
        /**
         * custom email send with custom url
         */
        $status = Password::sendResetLink($request->only(['email']), function($user, $token) {
            $user->notify(new ResetPasswordNotification($this->url, $user->email, $token));
        });
    
        return $status === Password::RESET_LINK_SENT
                    ? response()->json(['status' => __($status)])
                    : response()->json(['email' => __($status)], 422);
    }
}
