@extends('school.layout.layout')



@section('main')
     <!-- Banner section Sttart -->
  <div class="container-fluid g-0" id="home">
    <div class="banner-video">
    <video autoplay loop muted >
      <source src="{{ asset('school') }}/video/banner.mp4"  type="video/mp4">
    </video>
    </div>
    <div class="banner-overlay">
    </div>
    <div class="banner-messages">
          <h3>Wellcome to ITSD</h3>
          <p>Learn and Implemented</p>
          <!-- <button class="btn btn-danger">Get started</button> -->
           <a href="{{ route('discus.index') }}" class="btn btn-danger">Go to Discussion</a>
      </div>
  </div>
  <!-- Banner section end -->
  <div class="heighliter">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-sm-6 col-12 mt-md-2  text-center">
        <p>1000+ Online Course</p>
      </div>
      <div class="col-lg-3 col-sm-6 col-12 mt-md-2 text-center">
        <p>Expart Instructor</p>
      </div>
      <div class="col-lg-3 col-sm-6 col-12 mt-md-2 text-center">
        <p>Life Time Access</p>
      </div>
      <div class="col-lg-3 col-sm-6 col-12 mt-md-2 text-center">
        <p>Money Back Guarantee</p>
      </div>
    </div>
  </div>
  </div>
    <!-- Banner  heighliger end -->
    <!--Course Section Start -->
    <div class="container">
      <div class="content_header">
        <h1 class="text-center" >Popular Course</h1>
      </div>
      <div class="content_body">
        <div class="row">
          <!-- subject - 1-->
          @foreach ($populers as $populer)
          <div class="col-12 col-md-6 col-lg-4 py-1">
            <div class="card" style="width: 18rem;">
            <img src="{{ asset('storage/').'/'.$populer->thum }}" class="card-img-top" style="height:160px" alt="...">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <p class="card-text">
                {{ $word_limit($populer->description,20) }}
              </p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center"><span>Price: <del>{{ $populer->sell_price }}</del> {{ $populer->price }}</span>
                <!-- <button class="btn btn-primary">Enroll</button> -->
                 <a href="{{ route('front.course',$populer->id)}}" class="btn btn-primary">View</a>
            </li>
            </ul>
          </div>
          </div>
          
          @endforeach
            

         
        </div>
      </div>
    </div>
    <!-- Course Section end -->
     <!-- contact page -->
     <div class="container my-4" id="contactPage">
  <div class="content_header">
        <h1 class="text-center" >Contact With Us</h1>
      </div>
    <div class="row pb-5">
      <div class="col-md-8 col-12 offset-md-2">
          <div class="card shadow p-3">
            <div class="card-body">
              <form action="" method="post">
                <div class="mb-3">
                <input class="form-control" type="text" placeholder="Name" aria-label="default input example">
                </div>

                <div class="mb-3">
                <input class="form-control" type="text" placeholder="Subject" aria-label="default input example">
                </div>

                <div class="mb-3">
                <input class="form-control" type="text" placeholder="Email" aria-label="default input example">
                </div>

                <div class="mb-3">
                  <textarea name="" id="" class="form-control" placeholder="Openion.."></textarea>
                </div>
                <div class="d-flex justify-content-end">
                  <input type="submit" value="Submit" class="btn btn-success">
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
     <!-- contact page end -->
    
     <!-- Feedback Start -->
    <div class="conatiner-fluid bg-primary py-5 px-3" id="feedbackSection">
      <div class="content_header">
        <h1 class="text-center" >Student Feedback</h1>
      </div>

      <div class="owl-carousel">

          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="d-flex justify-content-center" >
                    <img style="width: 70px; border: 2px solid pink;border-radius: 50%;padding: 5px;" class="profile-user-img img-fluid img-circle" src="" alt="profile ">
                </div>
                <h3 class="profile-username text-center" >
                  name
                </h3>
                <p class="text-center">10-12-2024</p>
                <p style="text-align:justify">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, labore.
                </p>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="d-flex justify-content-center" >
                    <img style="width: 70px; border: 2px solid pink;border-radius: 50%;padding: 5px;" class="profile-user-img img-fluid img-circle" src="" alt="profile ">
                </div>
                <h3 class="profile-username text-center" >
                  name
                </h3>
                <p class="text-center">10-12-2024</p>
                <p style="text-align:justify">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, labore.
                </p>
              </div>
              <!-- /.card-body -->
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="d-flex justify-content-center" >
                    <img style="width: 70px; border: 2px solid pink;border-radius: 50%;padding: 5px;" class="profile-user-img img-fluid img-circle" src="" alt="profile ">
                </div>
                <h3 class="profile-username text-center" >
                  name
                </h3>
                <p class="text-center">10-12-2024</p>
                <p style="text-align:justify">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, labore.
                </p>
              </div>
              <!-- /.card-body -->
            </div>

          
            
      </div>

      


    </div>
    <!-- carousel end -->


@endsection

