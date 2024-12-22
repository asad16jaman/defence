<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    function index(){
        $id = Auth::user()->id;
        
        $courses = User::with(['feedbacks','courses','profile'])->find($id);
       
        return view('profile.index',['data'=>$courses]);
    }

    function editPicture(){
        return view('profile.changePic');
    }

    function updateProfilePicture(Request $request){

        $valid = Validator::make($request->all(),[
            'image'  => 'required|mimetypes:image/jpeg,image/png,image/gif,image/webp,image/bmp,image/tiff|max:4096',
        ]);

        if($valid->fails()){
            return redirect()->route('profile.edit.picture')->withErrors($valid->errors());
        }


        try{
            $current = User::find(auth()->user()->id);

            //delete old profile image
            if($current->img){            
                if(file_exists(storage_path().'/app/public/'.$current->img)){
                    unlink(storage_path().'/app/public/'.$current->img);
                }  
            }

            //store new profile image
            $newName = $request->file('image')->store(
                'profile', 'public'
            );

            User::where('id',Auth::user()->id)->update(['img'=>$newName]);

            return to_route('profile');

        }catch(Exception $e){
            return to_route('profile.edit.picture');
        } 

    }

    function update_profile(Request $request){

        try{
            User::where('id',auth()->user()->id)->update(['name'=>$request->input('name')]);
            Profile::where('user_id',auth()->user()->id)->update($request->only('occupation','city','phone','address'));
            return back();
        }catch(Exception $e){
            return back();
        }


    }



    function feedback(){
        return view('profile.feedback');
    }


    function changePassword(){
        return view('profile.changePassword');
    }



}
