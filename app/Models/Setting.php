<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model
{
    use HasFactory;
    public function images(){
        if ($this->image){
            return Storage::disk('local')->url('setting/'.$this->image);
        }
        return false;
    }
}
