<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Block;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function show(Request $request)
    {

        $users = User::where('role', 'user');
        $key = null;
        $requests = [];
        if ($request->all()) {
            $requests = $request->all();
            if ($request->location) {
                $key = $request->location;
                $users = $users->whereHas('details', function ($q) use ($key) {
                    $q->where('location', $key);
                });
            }
            if ($request->min_age) {
                $year = date('Y', strtotime('-' . $request->min_age . ' years'));
                $UID = [];
                foreach ($users->get() as $user) {
                    $dob = date('Y', strtotime($user->details->dob));
                    if ($year >= $dob) {
                        $UID[] = $user->id;
                    }
                }
                $users = User::whereIn('id', $UID);
            }
            if ($request->max_age) {
                $year = date('Y', strtotime('-' . $request->max_age . ' years'));
                $UID = [];
                foreach ($users->get() as $user) {
                    $dob = date('Y', strtotime($user->details->dob));
                    if ($year <= $dob) {
                        $UID[] = $user->id;
                    }
                }
                $users = User::whereIn('id', $UID);
            }
            if ($request->key) {
                $key = $request->key;
                $users = $users->whereHas('details', function ($q) use ($key) {
                    $q->whereRaw('( username LIKE "%' . $key . '%" or name LIKE "%' . $key . '%"  )');
                });
            }
            if ($request->children) {
                $key = $request->children;
                if ($key != 0) {
                    $users = $users->whereHas('details', function ($q) use ($key) {
                        $q->where('children', $key);
                    });
                }
            }
            if ($request->smoke) {
                $key = $request->smoke;
                if ($key != 0) {
                    $users = $users->whereHas('details', function ($q) use ($key) {
                        $q->where('smoke', $key);
                    });
                }
            }
            if ($request->drink) {
                $key = $request->drink;
                if ($key != 0) {
                    $users = $users->whereHas('details', function ($q) use ($key) {
                        $q->where('drink', $key);
                    });
                }
            }
            if ($request->why) {
                $key = $request->why;
                if ($key != 0) {
                    $users = $users->whereHas('details', function ($q) use ($key) {
                        $q->where('why_you_are_on_gfv', $key);
                    });
                }
            }
            if ($request->personality) {
                $key = $request->personality;
                if ($key != 0) {
                    $users = $users->whereHas('details', function ($q) use ($key) {
                        $q->where('personality_type', $key);
                    });
                }
            }
            if ($request->communication) {
                $key = $request->communication;
                if ($key != 0) {
                    $UID = [];
                    foreach ($users->get() as $user) {
                        $communications=explode('@@@',$user->details->communication_style);
                        if (in_array($key,$communications)){
                            $UID[]=$user->id;
                        }
                    }
                    $users = User::whereIn('id', $UID);
                }
            }
        }
        $users = $users->get();
        $users=blockedUserFilter($users);
        
        return view('user.search', compact('users', 'key', 'requests'));
    }
}
