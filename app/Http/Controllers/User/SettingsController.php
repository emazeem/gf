<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    //
    public function index(){
        return view('user.settings.index');
    }
    public function change_password(Request $request){
        $user = User::find(auth()->user()->id);
        $this->validate($request, [
            'oldpassword' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],
            ['oldpassword.required' => 'Please enter your current password',]);
        $user->password = Hash::make($request->get('password'));
        $user->save();
        return response()->json(['success'=>'Password is changed successfully!']);
    }
    public function account(Request $request){
        $user = User::find(auth()->user()->id);
        $this->validate($request, [
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$user->id],
            'timezone' => ['required'],
        ]);
        $user->username = $request->username;
        $user->timezone = $request->timezone;
        $user->save();
        return response()->json(['success'=>'Account settings are updated successfully!']);
    }


}
