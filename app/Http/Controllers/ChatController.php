<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Message;
use App\User;
use App\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //get messages containing the current logged in user
//        $messages = Message::where('User_Id', Auth::user()->User_Id)->where('Friend_Id', '!=', Auth::user()->User_Id)
//            ->orWhere('Friend_Id', Auth::user()->User_Id)->where('User_Id', '!=', Auth::user()->User_Id)->get();
//
//        //get all chat Id based on messages
//        $getChatId = $messages->pluck('Chat_Id')->toArray();
//
//        //get conversations
//        $conversations = Chat::whereIn('Chat_Id', $getChatId)->get();
//
//        return view('chat.index')->with('conversations', $conversations)->with('messages', $messages);
        $chats = Chat::all();
        return view ('chat.index')->with('chats', $chats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Tenant')->first()) {
            $connections = UserAccount::whereRoleIs('Employee')->get();
        }
        else if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Administrator')->first()){
            $connections = UserAccount::whereRoleIs('Tenant')->get();
        }
        else if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Employee')->first()){
            $connections = UserAccount::whereRoleIs('Tenant')->get();
        }
        return view('chat.create')->with('connections', $connections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chat = new Chat();
        $chat->Chat_Category = $request->input('Chat_Category');
        $chat->Chat_DateTime_Added = Carbon::now('Asia/Manila');
        $chat->Chat_Resolve = 0;
        $chat->save();

        return view('chat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friend = User::findOrFail($id);
        return view('chat.show')->withFriend($friend);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
