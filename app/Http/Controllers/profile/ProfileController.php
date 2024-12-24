<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Feedack;
use App\Models\Lessone;
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



    function feedback(int $id=null){

        $course = null;
        $enroll_course = null;
        if($id){
            $course = Course::find($id);
        }else{
            $enroll_course = User::with('courses')->where('id',auth()->user()->id)->get();
        }

        return view('profile.feedback',['course' => $course, "enrol_course" => $enroll_course]);
    }

    function storeFeedback(Request $request){

        $validator = Validator::make($request->all(), [
            'message' => "required|min:10",
            'course_id' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('profile.feedback')->withErrors($validator->errors());
        }

        $feedback_course_id = $request->input('course_id');
        $feedback_message  = htmlspecialchars(trim($request->input('message')));
        

        $fedbk =Feedack::where('user_id',auth()->user()->id)->where('course_id',$feedback_course_id)->first();
        if($fedbk){
            Feedack::find($fedbk->id)->update(['message'=>$feedback_message]);

        }else{
            $data = [
                'user_id' => auth()->user()->id,
                'course_id' => $feedback_course_id,
                'message' => $feedback_message
            ];
            Feedack::create($data);
        }

        return to_route('profile');


    }

    function deleteFeedback(int $id){
        $feed = Feedack::find($id);
        if($feed){
            $feed->delete();
        }
        return redirect()->route('profile');

    }

    function course(int $id,int $lesson=null){

        $course = Course::with('lessons')->find($id);
        $lesson = null;
        $lesson = Lessone::find($lesson);

        return view('profile.course',['course'=>$course,'current_lesson'=>$lesson]);
    }


    function changePassword(){
        return view('profile.changePassword');
    }



}
