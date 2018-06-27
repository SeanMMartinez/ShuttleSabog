<?php

namespace App\Http\Controllers;

use App\Personnel;
use App\PersonnelSchedule;
use Illuminate\Http\Request;

class PersonnelScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personnelScheds = PersonnelSchedule::all();
        return view('personnelsched.index')->with('personnelScheds', $personnelScheds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnels = Personnel::all();
        return view('personnelsched.create')->with('personnels', $personnels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arraycount = count($request->input('Days'));

        for ($i = 0; $i < $arraycount; ++$i){
            $personnelSched = new PersonnelSchedule();
            $personnelSched->Personnel_Id = $request->input('Personnel_Id');
            $personnelSched->Days = $request->input('Days')[$i];
            $personnelSched->Start_Time = $request->input('Start_Time')[$i];
            $personnelSched->End_Time = $request->input('End_Time')[$i];
            $personnelSched->Vacancy = $request->input('Vacancy');
            $personnelSched->Floor = $request->input('Floor');
            $personnelSched->save();
        }

        return view('personnelsched.index');
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
