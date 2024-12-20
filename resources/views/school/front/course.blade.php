@extends('school.layout.layout')

@section('main')

@include("school.front.nav.topBanner")



<div class="container">
    <div class="row pt-5 mb-3">
        <div class="col-8 offset-2 offset-md-0 col-md-4">
            <img src="{{ asset('storage').'/'.$course_detail->thum }} "  alt="" class="img-fluid rounded">
        </div>
        <div class="col-12 col-md-8">
            <h3>Course Name : Basic php</h3>
            <p class="text-justify">
                {{ $course_detail->description }} 
            </p>
            
            <div class="d-flex justify-content-between">
                <div>
                    <p>Duration : {{ $course_detail->duration }}  </p>
                    <p>Price : <del>{{ $course_detail->price }}  </del> <span>{{ $course_detail->sell_price }}  </span><span>&#2547;</span></p>
                </div>
                <div>
                <a href="{{ route('front.checkout',$course_detail->id)}}" class="btn btn-primary">Enroll Me</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5">

        <div class="col-12">
        <div class="card">
            <div class="card-body">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>Lesson No</th>
                    <th>Lesson Name</th>
                </tr>
            </thead>
            <tbody>
               
                @foreach ( $course_detail->lessons as $key=>$lesson)
                <tr>
                    <td>{{ $key+1}}</td>
                    <td>{{$lesson->name }}</td>
                </tr>

               
                
                @endforeach        
                
                
                
                
            </tbody>
        </table>
            </div>
        </div>
        </div>
    </div>

   
</div>





@endsection