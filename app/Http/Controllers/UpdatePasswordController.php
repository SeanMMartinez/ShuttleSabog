<?php

namespace App\Http\Controllers;

use App\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangePassword(){
        return view('auth.change_pass');
    }

    public function changePassword(Request $request){

        $userAccount = UserAccount::find(Auth::id());
        $hashedPassword = $userAccount->UserAccount_Password;

        if (!(Hash::check($request->get('oldPassword'), $hashedPassword))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        //Change Password
        $userAccount->UserAccount_Password = Hash::make($request->get('newPassword'));
        $userAccount->Password_Changed = 1;
        $userAccount->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }
}
