<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonnelSchedule extends Model
{
    //disables the timestamp
    public $timestamps = false;

    //name of the table
    protected $table = 'personnelschedule';

    //primary key
    protected $primaryKey = 'PersonnelSched_Id';

    //fields of the table
    protected $fillable = [
        'PersonnelSched_Id', 'Personnel_Id', 'Days', 'Start_Time', 'End_Time', 'Vacancy', 'Floor'
    ];

    public function personnel(){
        return $this->belongsTo('App\Personnel', 'Personnel_Id');
    }
}
