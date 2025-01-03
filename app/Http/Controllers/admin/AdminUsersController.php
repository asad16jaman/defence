<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Feedack;
use App\Models\Profile;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    //
    function index(string $type){

        $users = User::where('role',$type)->get();
        return view('admin.users.index',["users"=>$users]);
    }


    function create(){

        return view('admin.users.create');
    }

    function store(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|unique:users',
            'password' => "required"
        ]);

        $role = $request->input('role');
        $newUser = User::create($request->all());
        Profile::create(['user_id'=>$newUser->id]);

        return redirect()->route('admin.users',$role);
    }


    function edit(int $id){

        $editUser = User::find($id);
        return view('admin.users.edit',['currentUser' => $editUser]);
    }


    function update(Request $request,int $id){

        $request->validate([
            'name' => 'required|min:3|max:20'
        ]);

        $update_data = $request->except('password','email','_token');
        $role = $request->input('role');

        if($request->has('password') && trim($request->input('password')) != ""){
            $update_data['password'] = Hash::make($request->password);
        }
        // return response()->json($update_data);
        User::where('id',$id)->update($update_data);
        return redirect()->route('admin.users',$role);

    }



    function deleteUser(int $id){

        $delete_user = User::find($id);
        if($delete_user){
            $role = $delete_user->role;

            if($delete_user->img && file_exists(storage_path().'/app/public/'.$delete_user->img)){
                unlink(storage_path().'/app/public/'.$delete_user->img);
            }
            Profile::where('user_id',$id)->delete();
            $delete_user->delete();
            return redirect()->route('admin.users',$role);

        }
        

    }

    function feedback(){

        $all_feedback = Feedack::with(['course',"user"])->orderByDesc('id')->get();
        
        return view('admin.feedback.index',['feedbacks' => $all_feedback]);
    }

    function feedbackDelete(int $id){

        Feedack::where('id',$id)->delete();
        return redirect()->route('admin.feedback');
    }




}
