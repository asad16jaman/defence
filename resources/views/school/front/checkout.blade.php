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
                    <p>Name: Asad</p>
                    <p>Email: asad@gmail.com</p>
                    <p>Phone: 124577</p>
                    <p>City: Dhaka</p>
                    <p>Address: Tongi,Dhaka</p>
                    <p>Course Name: {{$course->name}}</p>
                    <p>Cost : {{$course->sell_price}}</p>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2">
                       
                            <form action="" method="post">
                                <input type="text" hidden name="amount"  value="" id="">
                                <input type="text" hidden name="course_name" value="" id="">
                                <input type="submit" value="Checkout" class="btn btn-primary">
                            </form>

                      
                                <!-- <p class="text-center">You Have purches this course</p> -->
                     
                       
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>







@endsection