<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table='chats_messages';

    protected $fillable=['sender_username','receiver_username','message','read'];
}
