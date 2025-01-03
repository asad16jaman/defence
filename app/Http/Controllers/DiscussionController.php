<?php

namespace App\Http\Controllers;
use App\Models\Catagory;
use App\Models\Thread;
use Illuminate\Http\Request;


class DiscussionController extends Controller
{
    //
    public function index(){

        $catagories = Catagory::all();

        return view('front.discus.index',['catagories'=>$catagories]);
    }

    public function threadlist(int $id){

        $catagory = Catagory::find($id);
        $threards = Thread::where('catagory_id',$id)->with(['user'=>function($qry){
            return $qry->select('id','email','name');
        }])->latest()->get();

        return view('front.discus.thread',['catagory'=>$catagory,'threads'=>$threards]);
    }

    public function storequestion(Request $request , int $id){

        $ob = [
            'title' => $request->title,
            'description' => $request->discription,
            'user_id' => (int)$request->user()->id,
            'catagory_id' => $id
        ];

        // return response()->json($ob);

        Thread::create($ob);

       
        return to_route('discus.threadlist',$id);


    }

    function updateQuestion(Request $request,int $id){
        $theard = Thread::find($id);

        $theard->title = $request->title;
        $theard->description = $request->description;
        $theard->save();

        

        return response()->json([
            'success' => true,
            'data' => $request->all()
        ]);
    }




    function threadDelete(int $catId,Thread $threadId){
        $threadId->delete();
        return to_route('discus.threadlist',$catId);
    }






}
