<?php
/**
 * Created by PhpStorm.
 * User: Mendel
 * Date: 6/5/2018
 * Time: 1:51 AM
 */

namespace App\Http\Controllers\API;

use App\BillBreakDown;
use App\Http\Controllers\Controller;
use App\Bill;
use App\User;
use App\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillApiController extends Controller
{
    public function bills(){
        if($userAccount = UserAccount::where('UserAccount_Id', Auth::guard('api')->id())->get()){
            $bills = Bill::where('User_Id', Auth::user()->User_Id)->get();

            return response()->json($bills);
        }
        else {
            return response()->json(['response' => 'access denied'], 400);
        }
    }

    public function billBreakDown($id){
        if($userAccount = UserAccount::where('UserAccount_Id', Auth::guard('api')->id())->get()){
            $bill = Bill::where('Bill_Id', $id)->first();
            $billbreakdowns = BillBreakDown::where('Bill_Id', $bill->Bill_Id)->get();

            return response()->json($billbreakdowns);
        }
        else {
            return response()->json(['response' => 'access denied'], 400);
        }
    }
}