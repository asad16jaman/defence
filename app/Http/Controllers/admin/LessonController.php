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

    function edit(int $lesson){

        $lesson = Lessone::with(['course'=>function($qury){
            $qury->select('id','name');
        }])->find($lesson);
        // return response()->json($lesson);

        return view('admin.lessons.edit',['lesson'=>$lesson]);


    }

    function update(Request $request,int $lesson){

        $valid = Validator::make($request->all(),[
            'name' => 'required|min:3'
        ]);
        if($valid->fails()){
            return redirect()->route('admin.lesson.edit',$lesson)
            ->withErrors($valid->errors())
            ->withInput($request->only('name'));
        }

        $edit_lesson = Lessone::find($lesson);
        $course_id = $edit_lesson->course_id;


        $update_data = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ];

        $newName = null;
        if($request->has('video')){
            try{
                
                if(file_exists(storage_path().'/app/public/'.$edit_lesson->video)){
                    unlink(storage_path().'/app/public/'.$edit_lesson->video);
                }

                $newName = $request->file('video')->store(
                    'lsn_video', 'public'
                );
                $update_data['video'] = $newName;
            }catch(\Exception $e){
                return redirect()->route('admin.problame');
            }

        }

        $edit_lesson->update($update_data);
        
        return redirect()->route('admin.lesson',$course_id);

    }




    function deleteLesson(int $lesson){

        $lesson = Lessone::find($lesson);
        $course_id = $lesson->course_id;
        if($lesson){

           try{
            if(file_exists(storage_path().'/app/public/'.$lesson->video)){
                unlink(storage_path().'/app/public/'.$lesson->video);
            }
            $lesson->delete();
            return redirect()->route('admin.lesson',$course_id);

           }catch(\Exception $e){
            return redirect()->route('admin.problame');
           }
        }else{

            return redirect()->route('admin.lesson');
        }

    }





}
