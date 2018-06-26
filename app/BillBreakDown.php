<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillBreakDown extends Model
{
    //disables the timestamp
    public $timestamps = false;
    //
    protected $table = 'billbreakdown';
    protected $primaryKey = 'BillBDown_Id';
    protected $fillable = ['BillBDown_Id','Bill_Id','BillBDown_Input','BillBDown_Consumption','BillBDown_PriceRate','BillBDown_Total'];
    public function bill(){
        return $this->belongsTo('App\Bill', 'Bill_Id');
    }
}
