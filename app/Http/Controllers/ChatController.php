<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Message;
use App\User;
use App\UserAccount;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connections = User::where('User_Id', Auth::user()->User_Id)->first()->connection();
        return view('chat.index')->with('connections', $connections);
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
        $friend = User::find($id);
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
            'User_Id' => $request->User_Id,
            'Friend_Id' => $request->Friend_Id,
            'Message_Text' => $request->Message_Text,
            'Message_TimeSent' => Carbon::now('Asia/Manila')
        ]);

        return [];
    }
}
