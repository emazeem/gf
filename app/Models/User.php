<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'timezone',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function details(){
        return $this->belongsTo(UserDetail::class,'id','user_id')->withDefault();
    }
    public function album(){
        return $this->hasMany(PhotoAlbum::class,'user_id');
    }

    public function profileCompletePercentage(){

        $columns=Schema::getColumnListing('user_details');
        $columns=array_diff($columns,['id','user_id','created_at','updated_at']);
        $array=[];
        foreach ($columns as $column){
            $array[$column]=$this->details[$column];
        }
        return (int)(count(array_filter($array))/count($array)*100);
    }
    public static function myUnreadMessages(){
        $unread=Chat::where('to',auth()->user()->id)->whereNull('read_at')->get();
        return $unread;
    }
    public function nextActionOfProfileCompletion(){
        $columns=Schema::getColumnListing('user_details');
        $columns=array_diff($columns,['id','user_id','created_at','updated_at']);
        $next=null;
        foreach ($columns as $column){
            if (!$this->details[$column]){
                $next=$column;
            }
        }
        return $next;
    }

    protected $dates = [
        'last_login'
    ];
}
