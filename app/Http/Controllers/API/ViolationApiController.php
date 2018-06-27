<?php
/**
 * Created by PhpStorm.
 * User: Mendel
 * Date: 6/27/2018
 * Time: 12:05 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\UserAccount;
use App\Violation;
use Illuminate\Support\Facades\Auth;

class ViolationApiController extends Controller
{
    public function violations(){
        if($userAccount = UserAccount::where('UserAccount_Id', Auth::guard('api')->id())->get()){
            $violations = Violation::where('Records_Owner', Auth::user()->User_Id)->get();

            if(count($violations) > 0){
                return response()->json($violations);
            }
            else{
                return response()->json(['response' => 'empty']);
            }
        }
        else {
            return response()->json(['response' => 'access denied'], 400);
        }
    }
}