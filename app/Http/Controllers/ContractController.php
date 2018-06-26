<?php

namespace App\Http\Controllers;

use App\Contract;
use App\TenantInfo;
use App\User;
use App\UserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
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
        $tenantInfo = TenantInfo::where('User_Id', $user->User_Id)->first();
        return view('contract.create')->withTenantInfo($tenantInfo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tenantInfo = $request->get('TenantInfo_Id');
        $tenant = TenantInfo::where('TenantInfo_Id', $tenantInfo)->first();
        $userAccount = UserAccount::where('User_Id', $tenant->User_Id)->first();

        //store contract info
        $contract = new Contract();
        $contract->TenantInfo_Id = $tenantInfo;
        $contract->Contract_Start = $request->input('Contract_Start');
        $contract->Contract_Expiry = $request->input('Contract_Expiry');
        $contract->Contract_Status = $request->input('Contract_Status');
        $contract->Contract_File = $request->input('Contract_File');
        $contract->save();

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
        $contract = Contract::where('Contract_Id', $id)->first();
        return view('contract.show')->withContract($contract);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contract = Contract::where('Contract_Id', $id)->first();
        return view('contract.edit')->withContract($contract);
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
        $contract = Contract::findOrFail($id);
        dd($contract);
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
