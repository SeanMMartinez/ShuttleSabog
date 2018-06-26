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
        $personnelSched = PersonnelSchedule::all();
        return view('personnelsched.index')->withPersonnelSchedule($personnelSched);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personnel = Personnel::all();
        return view('personnelsched.index')->withPersonnel($personnel);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $personnelSched = new PersonnelSchedule();
        $personnelSched->Personnel_Id = $request->input('Personnel_Id');
        $personnelSched->Day = $request->input('Day');
        $personnelSched->Time = $request->input('Time');
        $personnelSched->Vacancy = $request->input('Vacancy');
        $personnelSched->Floor = $request->input('Floor');
        $personnelSched->save();

        return view('personnelsched.show')->with('personnelSched', $personnelSched);
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
