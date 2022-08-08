<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;
    public function profile(){
        return Storage::disk('local')->url('blog/profile/'.$this->profile);
    }
    public function thumbnail(){
        return Storage::disk('local')->url('blog/thumbnail/'.$this->thumbnail);
    }

}
