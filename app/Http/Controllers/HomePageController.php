<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Feedack;
use App\Models\Order;
use App\Models\Profile;
use DB;
use Illuminate\Http\Request;
use Str;

class HomePageController extends Controller
{
    //
    function index(){

        $popular = DB::table('courses')->join('populers','courses.id' ,'=','populers.course_id')->get();
        $feedbacks = Feedack::with('user')->orderByDesc('id')->paginate(6);
       
        // return response()->json($feedbacks);
        
        return view('school.index',['populers'=>$popular,'feedbacks'=>$feedbacks]);
    }

    function course(int $id){
        $course_details = Course::with('lessons')->where('id',$id)->first();
        

        // return response()->json($course_details);
        return view('school.front.course',['course_detail'=>$course_details]);
    }

    function allCourse(){


        $allCrs = Course::get();
        return view('school.front.courses',['allCourse'=>$allCrs]);
    }

    function checkout(int $id){
        
        $course = Course::find($id);
        $profile = Profile::where('user_id',auth()->user()->id)->first();
        $isEnroll = CourseUser::where(['user_id'=>auth()->user()->id,'course_id'=>$id])->first();

        
        

        return view('school.front.checkout',['course'=>$course,"profile"=>$profile,'isEnroll'=>$isEnroll]);
    }

    function enrollCourse(Request $request){
        $ord = [
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'unique_id' => Str::uuid()->toString(),
            'amount' => $request->input('amount')
        ];

        $userOrd = [
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
        ];
        try{
            Order::create($ord);
            CourseUser::create($userOrd);
            return redirect()->route('profile');

        }catch(\Exception $e){
            return redirect()->route('home');
        }

    }











}
