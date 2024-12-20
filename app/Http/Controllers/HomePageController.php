<?php

namespace App\Http\Controllers;

use App\Models\Course;
use DB;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    function index(){

        $popular = DB::table('courses')->join('populers','courses.id' ,'=','populers.course_id')->get();

       
        
        return view('school.index',['populers'=>$popular]);
    }

    function course(int $id){
        $course_details = Course::with('lessons')->where('id',$id)->first();
        

        // return response()->json($course_details);
        return view('school.front.course',['course_detail'=>$course_details]);
    }

    function allCourse(){
        return view('school.front.courses');
    }

    function checkout(int $id){
        
        $course = Course::find($id);

        return view('school.front.checkout',['course'=>$course]);
    }











}
