<?php
/**
 * Created by PhpStorm.
 * User: Mendel
 * Date: 6/26/2018
 * Time: 2:52 PM
 */

namespace App\Http\Controllers\API;

use App\Conversation;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use App\UserAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationApiController extends Controller
{
    public function chatUser(){
        if(UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Tenant')->first()){
            $connections = UserAccount::whereRoleIs('Employee')->get();
        }
        else if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Administrator')->first()){
            $connections = UserAccount::whereRoleIs('Tenant')->get();
        }
        else if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Employee')->first()){
            $connections = UserAccount::whereRoleIs('Tenant')->get();
        }

        return response()->json($connections);
    }

    public function conversation(Request $request, $id){
        $conversation = new Conversation();
        $conversation->Chat_Category = $request->input('Chat_Category');
        $conversation->Chat_DateTime_Added = Carbon::now('Asia/Manila');
        $conversation->Chat_Resolve = 0;
        $conversation->save();
    }

    public function getChat($id){
        $messages = Message::where(function ($query) use ($id) {
            $query->where('User_Id', '=', Auth::user()->User_Id)->where('Friend_Id', '=', $id);
        })->orWhere(function ($query) use ($id){
            $query->where('User_Id', '=', $id)->where('Friend_Id', '=', Auth::user()->User_Id);
        })->get();

        return response()->json($messages);
    }
}