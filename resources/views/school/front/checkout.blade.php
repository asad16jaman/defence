@extends('school.layout.layout')

@section('main')

@include("school.front.nav.topBanner")



<div class="container">
    <div class="row my-5">
        <div class="col-md-8 col-12">
            <div class="row">
            <div class="col-8 offset-2 offset-md-0 col-md-4">
            <img src="{{ asset('storage').'/'.$course->thum }}"  alt="" class="img-fluid rounded">
        </div>
        <div class="col-12 col-md-8">
            <h3>{{$course->name}}</h3>
            <p class="text-justify text-justify">
            {{$course->description}}
            </p>
            
            <div class="d-flex justify-content-between">
                <div>
                    <p>Duration : {{$course->duration }} </p>
                    <p>Price : <del>{{$course->price}} </del> <span>{{$course->sell_price}} </span><span>&#2547;</span></p>
                </div>
                <div>
                </div>
            </div>
        </div>
            </div>
        </div>
       <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    Card Detail
                </div>
                <div class="card-body">
                    <p>Name: {{ auth()->user()->name }}</p>
                    <p>Email: {{ auth()->user()->email}}</p>
                    <p>Phone: {{ $profile->phone ?? "Not set yeat"}}</p>
                    <p>City: {{ $profile->city ?? "Not set yeat"}}</p>
                    <p>Address: {{ $profile->address ?? "Not set yeat"}}</p>
                    <p>Course Name: {{$course->name}}</p>
                    <p>Cost : {{$course->sell_price}}</p>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">
                        
                            @if($isEnroll)
                            <p class="text-center">You Have purches this course</p>
                            
                            @else
                            <form action="{{ route('enroll_course') }}" method="post">
                                @csrf
                                <input type="text" hidden name="amount"  value="{{ $course->sell_price }}" id="">
                                <input type="text" hidden name="course_id" value="{{ $course->id }}" id="">
                                <input type="submit" value="Checkout" class="btn btn-primary">
                            </form>

                            @endif

                      
                                <!--  -->
                     
                       
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>







@endsection