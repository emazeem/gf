<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
    public function profileCompletePercentage(){
        $string='headline,about_me,gender,employment,income_range,employment_group,hear_about_us,friends,education_level,location,dob,astrology,relationship,children,smoke,pets,drink,job_title,why_you_are_on_gfv,personality_type,communication_style,contact_by_people_from,availability,hobbies,sports,fitness,entertainment,music,movies,books,fav_tv_shows,fav_movies,fav_hobbies,fav_teams,fav_bands,fav_books,profile,cover';
        $columns=explode(',',$string);
        dd($columns);
    }
}
