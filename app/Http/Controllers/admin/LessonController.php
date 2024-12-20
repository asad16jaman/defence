<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lessone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    //
    function index(Request $request,?int $course = null){

        $all_lesson = null;
        if($course){
            $all_lesson = Lessone::where('course_id',$course)->get();
            return view('admin.lessons.index',["lessons"=>$all_lesson,'course'=>$course]);
        }
        $crs = $request->query('crs');
        if($crs){
            
            $all_lesson = Lessone::where('course_id',$crs)->get();
            return view('admin.lessons.index',["lessons"=>$all_lesson,'course'=>$crs]);
        }

        return view('admin.lessons.index',['course'=>null]);
    }



    function create(int $course){

        $crs = Course::select('name')->find($course);
        if($crs){
            return view('admin.lessons.create',['course'=>$crs]);
        }else{
            return view('admin.lesson');
        }
        
    }

    function store(Request $request,int $course){

        $my_course = Course::find($course);
        if(!$my_course){
            return redirect()->route('admin.lesson');
        }

        $valid = Validator::make($request->all(),[
            'name' => "required",
            'video' => 'required',
        ]);

        if($valid->fails()){
            return redirect()->route('admin.lesson.create',$course)->withErrors($valid->errors())->withInput();
        }

        $newName = null;
        if($request->has('video')){

            try{
                $newName = $request->file('video')->store(
                    'lsn_video', 'public'
                );
            }catch(\Exception $e){
                return redirect()->route('');
            }

        }

        $ob  = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'video'=> $newName,
            'course_id' => $course
        ];

        Lessone::create($ob);
        return redirect()->route('admin.lesson',$course);


    }





}
