<?php

namespace App\Http\Controllers;

use App\Address;
use App\Room;
use App\TenantGuardian;
use App\TenantInfo;
use App\UserAccount;
use App\User;
use App\Role;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($userAccounts = UserAccount::orderBy('UserAccount_Id')->whereRoleIs('Tenant')->get()){
            return view('users.index')->with('userAccounts', $userAccounts);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $rooms = Room::all();
        return view('users.create')->with('rooms', $rooms)->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store address
        $address = new Address();
        $address->Address_HomeAdd = $request->input('Address_HomeAdd');
        $address->Address_City = $request->input('Address_City');
        $address->Address_Province = $request->input('Address_Province');
        $address->Address_ZipCode = $request->input('Address_ZipCode');
        $address->save();

        //store user info
        $user = new User();
        $user->Address_Id = $address->Address_Id;
        $user->User_FirstName = $request->input('User_FirstName');
        $user->User_MiddleName = $request->input('User_MiddleName');
        $user->User_LastName = $request->input('User_LastName');
        $user->User_Picture = $request->input('User_Picture');
        $user->User_Nationality = $request->input('User_Nationality');
        $user->User_Birthdate = Carbon::parse($request->input('User_Birthdate'))->format('Y-m-d');
        $user->User_Age = $request->input('User_Age');
        $user->User_Religion = $request->input('User_Religion');
        $user->User_Gender = $request->input('User_Gender');
        $user->User_CivilStatus = $request->input('User_CivilStatus');
        $user->User_CellphoneNo = $request->input('User_CellphoneNo');
        $user->User_LandlineNo = $request->input('User_LandlineNo');
        $user->save();

        //store user account
        $userAccount = new UserAccount();
        $userAccount->UserAccount_Email = $request->input('UserAccount_Email');
        $userAccount->password = Hash::make($request->input('password'));
        $userAccount->UserAccount_Status = 1;
        $userAccount->User_Id = $user->User_Id;
        $userAccount->api_token = str_random(60);
        $userAccount->UserAccount_DateCreated = Carbon::now()->toDateTimeString();
        $userAccount->save();

        //store guardian info
        $tenantGuardian = new TenantGuardian();
        $tenantGuardian->TenantGuardian_FirstName = $request->input('TenantGuardian_FirstName');
        $tenantGuardian->TenantGuardian_LastName = $request->input('TenantGuardian_LastName');
        $tenantGuardian->TenantGuardian_Age = $request->input('TenantGuardian_Age');
        $tenantGuardian->TenantGuardian_Email = $request->input('TenantGuardian_Email');
        $tenantGuardian->TenantGuardian_CellphoneNo = $request->input('TenantGuardian_CellphoneNo');
        $tenantGuardian->TenantGuardian_LandlineNo = $request->input('TenantGuardian_LandlineNo');
        $tenantGuardian->TenantGuardian_Relation = $request->input('TenantGuardian_Relation');
        $tenantGuardian->save();

        //store to Tenant Info
        $tenantInfo = new TenantInfo();
        $tenantInfo->TenantGuardian_Id = $tenantGuardian->TenantGuardian_Id;
        $tenantInfo->User_Id = $user->User_Id;
        $tenantInfo->TenantRoom_Id = $request->input('TenantRoom_Id');
        $tenantInfo->save();

        $tenantIds = DB::table('tenantinfo')
            ->join('user', 'tenantinfo.User_Id', '=', 'user.User_Id')
            ->join('room', 'room.TenantRoom_Id', '=', 'tenantinfo.TenantRoom_Id')
            ->select('user.User_Id')
            ->where('room.TenantRoom_Id','=', $tenantInfo->TenantRoom_Id)
            ->get();
        $tenantCount = count($tenantIds);

        $room = Room::where('TenantRoom_Id', $tenantInfo->TenantRoom_Id)->first();
        $room->RoomLimit = $tenantCount;

        if($room->RoomType == 'Double'){
            if($room->RoomLimit == 2){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit < 2){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        else if($room->RoomType == 'Quadruple'){
            if($room->RoomLimit == 2){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit < 2){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        else if($room->RoomType == 'Hexatruple'){
            if($room->RoomLimit == 6){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit < 6){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        $room->save();

        //set the role to tenant
        $userAccount->attachRole('Tenant');

        return view("users.show")->with('userAccount', $userAccount);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userAccount = UserAccount::where('UserAccount_Id', $id)->with('roles')->first();
        return view("users.show")->with('userAccount', $userAccount);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userAccount = UserAccount::where('UserAccount_Id', $id)->with('roles')->first();

        //get user Id
        $userId = $userAccount->User_Id;
        $user = User::where('User_Id', $userId)->first();

        //get address Id
        $addressId = $user->Address_Id;
        $address = Address::where('Address_Id', $addressId)->first();

        $roles = Role::all();

        $rooms = Room::all();

        $tenantInfo = TenantInfo::where('User_Id', $user->User_Id)->first();

        return view("users.edit")->withUserAccount($userAccount)->withAddress($address)->withTenantInfo($tenantInfo)
            ->with('roles', $roles)->with('rooms', $rooms);
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
        $userAccount = UserAccount::findOrFail($id);
        $userAccount->UserAccount_Email = $request->input('UserAccount_Email');
        $userAccount->UserAccount_Status = $request->input('UserAccount_Status');
        $userAccount->api_token = str_random(60);
        $userAccount->UserAccount_DateCreated = Carbon::now()->toDateTimeString();
        $userAccount->save();

        $user = User::where('User_Id', $userAccount->User_Id)->first();
        $user->User_FirstName = $request->input('User_FirstName');
        $user->User_MiddleName = $request->input('User_MiddleName');
        $user->User_LastName = $request->input('User_LastName');
        $user->User_Picture = $request->input('User_Picture');
        $user->User_Nationality = $request->input('User_Nationality');
        $user->User_Birthdate = $request->input('User_Birthdate');
        $user->User_Age = $request->input('User_Age');
        $user->User_Religion = $request->input('User_Religion');
        $user->User_Gender = $request->input('User_Gender');
        $user->User_CivilStatus = $request->input('User_CivilStatus');
        $user->User_CellphoneNo = $request->input('User_CellphoneNo');
        $user->User_LandlineNo = $request->input('User_LandlineNo');
        $user->save();

        $address = Address::where('Address_Id', $user->Address_Id)->first();
        $address->Address_HomeAdd = $request->input('Address_HomeAdd');
        $address->Address_City = $request->input('Address_City');
        $address->Address_Province = $request->input('Address_Province');
        $address->Address_ZipCode = $request->input('Address_ZipCode');
        $address->save();


        $tenantInfo = TenantInfo::where('User_Id', $user->User_Id)->first();
        $tenantGuardian = TenantGuardian::where('TenantGuardian_Id', $tenantInfo->TenantGuardian_Id)->first();

        //store guardian info
        $tenantGuardian->TenantGuardian_FirstName = $request->input('TenantGuardian_FirstName');
        $tenantGuardian->TenantGuardian_LastName = $request->input('TenantGuardian_LastName');
        $tenantGuardian->TenantGuardian_Age = $request->input('TenantGuardian_Age');
        $tenantGuardian->TenantGuardian_Email = $request->input('TenantGuardian_Email');
        $tenantGuardian->TenantGuardian_CellphoneNo = $request->input('TenantGuardian_CellphoneNo');
        $tenantGuardian->TenantGuardian_LandlineNo = $request->input('TenantGuardian_LandlineNo');
        $tenantGuardian->TenantGuardian_Relation = $request->input('TenantGuardian_Relation');
        $tenantGuardian->save();

        //remove the user from current room id
        $room = Room::where('TenantRoom_Id', $tenantInfo->TenantRoom_Id)->first();
        $tenantIds1 = DB::table('tenantinfo')
            ->join('user', 'tenantinfo.User_Id', '=', 'user.User_Id')
            ->join('room', 'room.TenantRoom_Id', '=', 'tenantinfo.TenantRoom_Id')
            ->select('user.User_Id')
            ->where('room.TenantRoom_Id','=', $tenantInfo->TenantRoom_Id)
            ->get();
        $tenantCount1 = count($tenantIds1);

        $room->RoomLimit = --$tenantCount1;
        if($room->RoomType == 'Double'){
            if($room->RoomLimit == 2){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit <= 1){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        else if($room->RoomType == 'Quadruple'){
            if($room->RoomLimit == 4){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit <= 3){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        else if($room->RoomType == 'Hexatruple'){
            if($room->RoomLimit == 6){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit <= 5){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        $room->save();

        //save tenant info
        $tenantInfo->TenantGuardian_Id = $tenantGuardian->TenantGuardian_Id;
        $tenantInfo->User_Id = $user->User_Id;
        $tenantInfo->TenantRoom_Id = $request->input('TenantRoom_Id');
        $tenantInfo->save();

        //add the user to the new selected room id
        $room = Room::where('TenantRoom_Id', $tenantInfo->TenantRoom_Id)->first();
        $tenantIds2 = DB::table('tenantinfo')
            ->join('user', 'tenantinfo.User_Id', '=', 'user.User_Id')
            ->join('room', 'room.TenantRoom_Id', '=', 'tenantinfo.TenantRoom_Id')
            ->select('user.User_Id')
            ->where('room.TenantRoom_Id','=', $tenantInfo->TenantRoom_Id)
            ->get();
        $tenantCount2 = count($tenantIds2);

        $room->RoomLimit = $tenantCount2;

        if($room->RoomType == 'Double'){
            if($room->RoomLimit == 2){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit <= 1){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        else if($room->RoomType == 'Quadruple'){
            if($room->RoomLimit == 4){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit <= 3){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        else if($room->RoomType == 'Hexatruple'){
            if($room->RoomLimit == 6){
                $room->RoomStatus = 1; //if 1 room is full
            }
            else if ($room->RoomLimit <= 5){
                $room->RoomStatus = 0; //if 0 room is vacant
            }
        }
        $room->save();

        return redirect()->route('users.show', $id);
    }
}
