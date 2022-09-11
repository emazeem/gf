<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    public function fromUser(){
        return $this->belongsTo(User::class,'from');
    }
    public function toUser(){
        return $this->belongsTo(User::class,'to');
    }
    public function id(){
        return str_pad($this->id,5,0,STR_PAD_LEFT);
    }
    public function status(){
        if ($this->status==0){
            return "Pending";
        }
        return "Closed";
    }


}
