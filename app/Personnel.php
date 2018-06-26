<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    //disables the timestamp
    public $timestamps = false;

    //name of the table
    protected $table = 'personnels';

    //primary key
    protected $primaryKey = 'Personnel_Id';

    //fields of the table
    protected $fillable = [
        'Personnel_Id', 'Personnel_FirstName','Personnel_MiddleName', 'Personnel_LastName', 'Pwork_Id', 'Personnel_ContactNumber',
        'Personnel_Gender', 'Personnel_DateAdded', 'Personnel_Birthdate', 'Personnel_Status'
    ];

    public function work(){
        return $this->belongsTo('App\PersonnelWork', 'Pwork_Id');
    }

    public function sched(){
        return $this->hasMany('App\PersonnelSchedule', 'Personnel_Id');
    }

}
