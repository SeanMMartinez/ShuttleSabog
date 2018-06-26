<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //disables the timestamp
    public $timestamps = false;

    protected $table = 'bills';

    protected $primaryKey = 'Bill_Id';

    protected $fillable = [
        'Bill_Id','User_Id','Bill_Month','Bill_Total','Bill_DividedTotal','Bill_DateTime_Created','Bill_DueDate','Bill_Status'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'User_Id');
    }
    public function billBreakDown(){
        return $this->hasMany('App\BillBreakDown', 'Bill_Id');
    }
}
