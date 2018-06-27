<?php

namespace App;

use App\Events\ChatEvent;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'Message_Id';

    protected $table = 'messages';

    protected $fillable = [
        'Message_Id', 'Chat_Id', 'Message_Text', 'Message_TimeSent', 'User_Id', 'Friend_Id'
    ];

    protected $dispatchesEvents = [
      'created' => ChatEvent::class
    ];

    public function chat(){
        return $this->belongsTo('App\Chat', 'Chat_Id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'User_Id');
    }
}
