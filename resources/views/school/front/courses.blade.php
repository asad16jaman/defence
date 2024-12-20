@extends('school.layout.layout')

@section('main')

@include("school.front.nav.topBanner")



<div class="container">
    <div class="content_header">
        <h1 class="text-center" >All Courses</h1>
    </div>
      <div class="content_body">
        <div class="row">

        
            <!-- subject - 1-->
          <div class="col-12 col-md-6 col-lg-4 py-1">
          <div class="card" style="width: 18rem;">
            <img src="./admin/_assets/crs_thum/" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Basic Php</h5>
              <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod ab facere, incidunt commodi sit asperiores earum optio corporis suscipit quasi!</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center"><span>Price: <del>200</del> 100</span>
                 <a class="btn btn-primary" href="">View Details</a>
            </li>
            </ul>
          </div>
          </div>
       
        </div>
      </div>
    <div class="content-footer">
      <div class="row">
      <div class="clearfix d-flex justify-content-center my-3">
                <ul class="pagination pagination-sm m-0 float-right">
                
                </ul>
              </div>
      </div>
    </div>
   
</div>




@endsection