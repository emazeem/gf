<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name='Admin';
        $user->email='admin@gmail.com';
        $user->email_verified_at='2022-04-28 08:49:09';
        $user->password='$2y$10$SKjPz.HBfF5hpBNKXxDGHury8ZN2IW8G3KuWoe6UqRShPltsh8UGm';
        $user->username='emazeem0';
        $user->timezone='';
        $user->role='admin';
        $user->status='active';
        $user->stripe_customer_id=NULL;
        $user->last_login=NULL;
        $user->remember_token=NULL;
        $user->created_at='2022-04-03 08:46:09';
        $user->updated_at='2022-04-03 08:46:09';
        $user->save();

    }
}
