<?php

namespace App\Http\Controllers;

use App\Chat;
use App\Events\ChatEvent;
use App\Message;
use App\User;
use App\UserAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $friends = User::where('User_Id', Auth::user()->User_Id)->first()->connection();
//      return view('chat.index')->with('friends', $friends);
//        if(UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Tenant')->first()){
//            $connections = UserAccount::whereRoleIs('Employee')->get();
//            return view('chat.index')->with('connections', $connections);
//        }
//        else if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Administrator')->first()){
//            $connections = UserAccount::whereRoleIs('Tenant')->get();
//            return view('chat.index')->with('connections', $connections);
//        }
//        else if (UserAccount::where('User_Id', Auth::user()->User_Id)->whereRoleIs('Employee')->first()){
//            $connections = UserAccount::whereRoleIs('Tenant')->get();
//            return view('chat.index')->with('connections', $connections);
//        }

        //get messages containing the current logged in user
        $messages = Message::where('User_Id', Auth::user()->User_Id)->where('Friend_Id', '!=', Auth::user()->User_Id)
            ->orWhere('Friend_Id', Auth::user()->User_Id)->where('User_Id', '!=', Auth::user()->User_Id)->get();

        //get all chat Id based on messages
        $getChatId = $messages->pluck('Chat_Id')->toArray();

        //get conversations
        $conversations = Chat::whereIn('Chat_Id', $getChatId)->get();

        return view('chat.index')->with('conversations', $conversations)->with('messages', $messages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    public function getChat($id){
        $messages = Message::where(function ($query) use ($id) {
            $query->where('User_Id', '=', Auth::user()->User_Id)->where('Friend_Id', '=', $id);
        })->orWhere(function ($query) use ($id){
            $query->where('User_Id', '=', $id)->where('Friend_Id', '=', Auth::user()->User_Id);
        })->get();

        return $messages;
    }

    public function sendChat(Request $request){
        Message::create([
            'Chat_Id' => $request->Chat_Id,
            'User_Id' => $request->User_Id,
            'Friend_Id' => $request->Friend_Id,
            'Message_Text' => $request->Message_Text,
            'Message_TimeSent' => Carbon::now('Asia/Manila')
        ]);

        return [];
    }
}
