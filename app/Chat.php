<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'Chat_Id';

    protected $table = 'chat';

    protected $fillable = [
        'Chat_Id', 'Chat_Category', 'Chat_DateTimeAdded', 'Chat_DateTimeResolved', 'Chat_Resolve'
    ];

    public function messages(){
        return $this->hasMany('App\Message', 'Chat_Id');
    }
}
