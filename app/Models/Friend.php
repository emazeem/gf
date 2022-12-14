<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    public function user_from(){
        return $this->belongsTo(User::class,'from');
    }
    public function user_to(){
        return $this->belongsTo(User::class,'to');
    }
}
