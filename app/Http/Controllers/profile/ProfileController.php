<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    function index(){
        return view('profile.index');
    }

    function editPicture(){
        return view('profile.changePic');
    }



    function feedback(){
        return view('profile.feedback');
    }


    function changePassword(){
        return view('profile.changePassword');
    }



}
