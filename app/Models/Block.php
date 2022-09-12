<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    public function toUser(){
        return $this->belongsTo(User::class,'to');
    }
    public function fromUser(){
        return $this->belongsTo(User::class,'from');
    }
}
