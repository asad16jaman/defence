<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lessone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;

class CourseController extends Controller
{
    //


    function index(){
        $all_crs = Course::with(['user'=>function($qury){
            return $qury->select('id','name');
        }])->get();
        // return response()->json($all_crs);
        return view('admin.courses.index',['allCourses'=>$all_crs]);
    }

    function create(){

        $inst = User::where('role','instructor')->get();
        
        return view('admin.courses.create',['instructors'=>$inst,"edit"=>false]);
    }

    function store(Request $request){
       $valid = Validator::make($request->all(),[
        'name'  => "required|min:3",
        'author' => "required",
        'duration' => 'required',
        'price' => 'required',
        'sell_price' => 'required'
       ]);
       if($valid->fails()){
        return redirect()->route('admin.course.create')->withErrors($valid->errors())->withInput();
       }

       $newName = null;
        if($request->has('img')){


            try{
                $newName = $request->file('img')->store(
                    'crs_thum', 'public'
                );
            }catch(\Exception $e){
                return redirect()->route('');
            }

        }

        $ob = [
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            'user_id' => $request->input('author'),
            'duration' => $request->input('duration'),
            'price' => $request->input('price'),
            'sell_price' => $request->input('sell_price'),
            'thum' => $newName,
        ];
        

        Course::create($ob);
        return redirect()->route('admin.courses');



       
    }


    function edit(int $id){
        $inst = User::where('role','instructor')->get();

        $course = Course::find($id);
        return view('admin.courses.edit',['instructors'=>$inst,"course"=>$course,"edit"=>true]);

    }

    function update(Request $request, int $id){

        $crs = Course::find($id);

        $valid = Validator::make($request->all(),[
            'name'  => "required|min:3",
            'author' => "required",
            'duration' => 'required',
            'price' => 'required',
            'sell_price' => 'required'
           ]);

           if($valid->fails()){
            return redirect()->route('admin.course.edit',$id)->withErrors($valid->errors())->withInput();
           }

        
        $newName = null;
        if($request->has('img')){
            try{
                
                if(file_exists(storage_path().'/app/public/'.$crs->thum)){
                    unlink(storage_path().'/app/public/'.$crs->thum);
                }

                $newName = $request->file('img')->store(
                    'crs_thum', 'public'
                );
            }catch(\Exception $e){
                return redirect()->route('admin.problame');
            }

        }

        $ob = [
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            'user_id' => $request->input('author'),
            'duration' => $request->input('duration'),
            'price' => $request->input('price'),
            'sell_price' => $request->input('sell_price'),
            'thum' => $newName ?? $crs->thum,
        ];

        Course::where('id',$id)->update($ob);
        
        return redirect()->route('admin.courses');

    }

    function delete_lesson(int $lesson):void{
        $lesson = Lessone::find($lesson);
        
        if($lesson){

           try{
            if(file_exists(storage_path().'/app/public/'.$lesson->video)){
                unlink(storage_path().'/app/public/'.$lesson->video);
            }
            $lesson->delete();
           

           }catch(\Exception $e){
            
           }
        }else{

           
        }
    }

    function delete(int $id){

        $delete_course = Course::find($id);

        if($delete_course){
            try{

                if(file_exists(storage_path().'/app/public/'.$delete_course->thum)){
                    unlink(storage_path().'/app/public/'.$delete_course->thum);
                }
    
                $lessons = Lessone::where('course_id',$id)->get();
                foreach($lessons as $lsn){
                    $this->delete_lesson($lsn->id);
                    $lsn->delete();
                }
                
                $delete_course->delete();
                return redirect()->route('admin.courses');

            }catch(\Exception $e){
                return redirect()->route('admin.problame');
            }

        }
        
    }






    
}
