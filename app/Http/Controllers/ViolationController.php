<?php

namespace App\Http\Controllers;

use App\User;
use App\UserAccount;
use App\Violation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViolationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userAccount = UserAccount::where('UserAccount_Id', $request->UserAccount_Id)->first();
        $user = User::where('User_Id', $userAccount->User_Id)->first();
        return view('violations.create')->withUser($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->get('User_Id');

        //store contract info
        $violation = new Violation();
        $violation->Records_CreatedBy = Auth::user()->User_Id;
        $violation->Records_Owner = $user;
        $violation->Records_Title = $request->input('Records_Title');
        $violation->Records_Text = $request->input('Records_Text');
        $violation->Records_DateTime_Added = Carbon::now('Asia/Manila')->toDateTimeString();
        $violation->save();

        $userAccount = UserAccount::where('User_Id', $user)->first();
        return redirect()->route('users.show', $userAccount->UserAccount_Id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
