<?php

namespace App\Http\Controllers;

use App\Mail\ResetMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class AccountsController extends Controller
{
    public function validatePasswordRequest(Request $request){

        //validation login here
        $user = User::where('email', '=', $request->email)
        ->first();

        //Check if the user exists
        if (!$user) {
        return redirect()->back()->withErrors(['email' => trans('User does not exist')]);
        }


        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')
        ->where('email', $request->email)->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return redirect()->back()->with('status', trans('A reset link has been sent to your email address.'));
        } else {
            return redirect()->back()->withErrors(['error' => trans('A Network Error occurred. Please try again.')]);
        }

    }

    private function sendResetEmail($email, $token)
    {
    //Retrieve the user from the database
    $user = User::where('email', $email)->select('name', 'email')->first();
    //Generate, the password reset link. The token generated is embedded in the link


    $data = new \stdClass();
    $data->link = Config('app.url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        // dd($data);
        try {
            Mail::to($user->email)->send(new ResetMail($data));

            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function resetPassword(Request $request)
    {


        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
        ->where('token', $request->token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('auth.passwords.email');

        $user = User::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        //Hash and update the new password
        $user->password = $password;
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        //Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
        ->delete();

        //Send Email Reset Success Email
        // if ($this->sendSuccessEmail($tokenData->email)) {
        //     return view('index');
        // } else {
        //     return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        // }

    }


}
