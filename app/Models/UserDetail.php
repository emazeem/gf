<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserDetail extends Model
{
    use HasFactory;
    public function profile_image()
    {
        if ($this->profile) {
            if (!File::exists(public_path() . '/storage/profile/' .$this->profile)) {
                return url('user/default_profile.png');
            }
            return Storage::disk('local')->url('/profile/'.$this->profile);
        }
        return url('user/default_profile.png');
    }
    public function cover_image()
    {
        if ($this->cover) {
            if (!File::exists(public_path() . '/storage/cover/' .$this->cover)) {
                return url('user/default_cover.png');
            }
            return Storage::disk('local')->url('/cover/'.$this->cover);
        }
        return url('user/default_cover.png');
    }

}
