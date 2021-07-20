<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function changeuser(){

        $user=user::where('id','=',Auth::user()->id)->first();
        $user->name=request('name');
        $user->email=request('email');
        $user->save();

    }
    public function changepass(){

        $user=user::where('id','=',Auth::user()->id)->first();
        if(!(Hash::check(request('oldpass'), $user->password))){
            echo "the passwords not match!";
        }
        else if(request('newpass')!=request('confnewpass')){
            echo "the new passwords not match!"; 
        }
        else{
            $user->password=Hash::make(request('newpass'));
            $user->save();
            echo "The Password succesfully changed!"; 
        }

        $user->save();

    }
}
