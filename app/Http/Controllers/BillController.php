<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillBreakDown;
use App\Room;
use App\TenantInfo;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::orderBy('Bill_DateTime_Created', 'DESC')->paginate(10);
        return view('bills.index')->with('bills', $bills);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //shows rooms in view controller
    public function create()
    {
        $rooms = DB::table('tenantinfo')
            ->join('room','tenantinfo.TenantRoom_Id','=', 'room.TenantRoom_Id')
            ->select('room.TenantRoom_Id','room.Room')
            ->where('tenantinfo.User_Id','>','0')
            ->distinct('room.TenantRoom_Id')
            ->get();

        return view('bills.create')->with('rooms', $rooms);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $RoomId = $request->input('TenantRoom_Id');
        $tenantIds = DB::table('tenantinfo')
            ->join('user', 'tenantinfo.User_Id', '=', 'user.User_Id')
            ->join('room', 'room.TenantRoom_Id', '=', 'tenantinfo.TenantRoom_Id')
            ->select('user.User_Id')
            ->where('room.TenantRoom_Id','=', $RoomId)
            ->get();
        $tenantCount = count($tenantIds);
        $arraycount = count($request->input('BillBDown_Input'));

        foreach($tenantIds as $tenantId){
            $bill = new Bill();
            $User_Id = $tenantId->User_Id;
            $bill->User_Id = $User_Id;
            $bill->Bill_Month = $request->input('Bill_Month');
            $bill->Bill_DateTime_Created = Carbon::now('Asia/Manila')->toDateTimeString();
            $bill->Bill_DueDate = Carbon::parse($request->input('Bill_DueDate'))->format('Y-m-d');
            $bill->Bill_Status = $request->input('Bill_Status');
            $bill->Bill_DividedTotal = '0';
            $bill->Bill_Total = '0';
            $bill->save();
            // $BillId = $bill->Bill_Id;
            $TotalBill = 0;

            for ($i = 0; $i < $arraycount; ++$i)
            {
                $billbreakdown = new BillBreakDown();
                $billbreakdown->Bill_Id = $bill->Bill_Id;
                $BillInput = $request->BillBDown_Input[$i];
                $billbreakdown->BillBDown_Input = $BillInput;
                $BillConsumption = $request->BillBDown_Consumption[$i];
                $billbreakdown->BillBDown_Consumption = $BillConsumption;
                $Bill_PriceRate = $request->BillBDown_PriceRate[$i];
                $billbreakdown->BillBDown_PriceRate = $Bill_PriceRate;
                $BillBDown_Total = $BillConsumption * $Bill_PriceRate;
                $billbreakdown->BillBDown_Total = $BillBDown_Total;
                $billbreakdown->save();
                $TotalBill = $TotalBill + $BillBDown_Total ;
            }
            $totalDivided = $TotalBill / $tenantCount;
            DB::table('bills')
                ->where('Bill_Id','=', $bill->Bill_Id )
                ->update(['Bill_DividedTotal' => $totalDivided,'Bill_Total'=>$TotalBill]);

        }
        return redirect()->route('bills.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::where('Bill_Id', $id)->first();
        $billbreakdowns = BillBreakDown::where('Bill_Id','=',$bill->Bill_Id)->get();
        return view('bills.show')->with('bill', $bill)->with('billbreakdowns',$billbreakdowns);
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
