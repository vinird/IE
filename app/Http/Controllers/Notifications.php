<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Notifications extends Controller
{
    public function clearNotification(){
    	$user = User::find(Auth::user()->id);
    	$user->notification = 0;
    	$user->save();
    	return Redirect::back();
    }
}
