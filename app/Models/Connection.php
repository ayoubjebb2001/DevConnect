<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'sender_id',
        'receiver_id',
    ];

    public function sender(){
        return $this->belongsTo(User::class,'id','sender_id');
    }
}
