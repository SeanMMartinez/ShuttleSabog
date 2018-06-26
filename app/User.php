<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //disables the timestamp
    public $timestamps = false;

    //name of the table
    protected $table = 'user';

    //primary key
    protected $primaryKey = 'User_Id';

    //fields of the table
    protected $fillable = [
        'User_Id', 'Address_Id','User_FirstName', 'User_MiddleName', 'User_LastName', 'User_Picture', 'User_Nationality',
        'User_Birthdate', 'User_Age', 'User_Religion', 'User_Gender', 'User_CivilStatus',
        'User_CellphoneNo', 'User_LandlineNo'
    ];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['User_Birthdate'])->age;
    }

    //Set relationship
    public function userAccount(){
        return $this->belongsTo("App\UserAccount", "User_Id");
    }

    public function announcement(){
        return $this->hasMany('App\Announcement', 'User_Id');
    }

    public function address(){
        return $this->belongsTo('App\Address', 'Address_Id');
    }

    public function tenantInfo(){
        return $this->hasOne('App\TenantInfo', 'User_Id');
    }

    public function message(){
        return $this->hasMany('App\Message', 'User_Id');
    }
    public function tenantRecord(){
        return $this->hasMany('App\Violation', 'User_Id');
    }


    //connection of two users
    public function myConnection(){
        return $this->belongsToMany('App\User', 'connection', 'User_Id', 'Friend_Id');
    }
    public function connectionOf(){
        return $this->belongsToMany('App\User', 'connection', 'Friend_Id', 'User_Id');
    }
    public function connection(){
        return $this->myConnection->merge($this->connectionOf);
    }
}
