<?php
/**
 * Created by PhpStorm.
 * User: Mendel
 * Date: 6/27/2018
 * Time: 11:54 AM
 */

namespace App\Http\Controllers\API;


use App\Contract;
use App\Http\Controllers\Controller;
use App\TenantInfo;
use App\User;
use App\UserAccount;
use Illuminate\Support\Facades\Auth;

class ContractApiController extends Controller
{
    public function contracts(){
        if($userAccount = UserAccount::where('UserAccount_Id', Auth::guard('api')->id())->get()){
            $user = User::where('User_Id', Auth::user()->User_Id)->first();
            $tenantInfo = TenantInfo::where('User_Id', $user->User_Id)->first();
            $contracts = Contract::where('TenantInfo_Id', $tenantInfo->TenantInfo_Id)->get();

            if(count($contracts) > 0){
                return response()->json($contracts);
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