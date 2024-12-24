<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feedack;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    //
    function index(){

        $users = User::all();
       

        return view('admin.users.index',["users"=>$users]);
    }




    function feedback(){

        $all_feedback = Feedack::with(['course',"user"])->orderByDesc('id')->get();
        
        return view('admin.feedback.index',['feedbacks' => $all_feedback]);
    }




}
