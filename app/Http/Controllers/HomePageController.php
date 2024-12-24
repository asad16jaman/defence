<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Feedack;
use DB;
use Illuminate\Http\Request;

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

        return view('school.front.checkout',['course'=>$course]);
    }











}
