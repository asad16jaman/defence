@extends('profile.layout.layout')

@section("main")

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->
  
  

    <section class="content mt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  
                  <img class="profile-user-img img-fluid img-circle" src="/profile/picture/avatar.png" alt="some ">
                  
                    <!-- <img class="profile-user-img img-fluid img-circle" src="/profile/picture/" alt="User profile picture"> -->
                   
                </div>

                <h3 class="profile-username text-center">asad</h3>

                <p class="text-muted text-center"> Student</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone</b> 
                    <a class="float-right">
                    <++82154789
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>City</b> 
                    <a class="float-right">
                    Dhaka
                    </a>
                  </li>
                </ul>

                <a href="{{ route('profile.edit.picture') }}" class="btn btn-primary btn-block"><b>Update Profile Pic</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
      


            
          <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">My Course</a></li>
                      <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">My Feedback</a></li>
                      <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      
                      <!-- /.tab-pane -->
                      <div class="tab-pane active" id="activity">
                        <!-- Second  Tab contend  will be hare... -->
                        
                        <!-- course card -->
                        
                        <div class="card mb-3">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-4 col-12">
                                <img src="/admin/_assets/crs_thum/" class="img-fluid" alt="">
                              </div>
                              <div class="col-md-8 col-12">
                                    <div class="d-flex justify-content-between">
                                        <h3></h3>
                                        <span>10-1101999</span>
                                    </div>
                                    <p>
                                   Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas minus magnam molestias soluta esse sapiente reiciendis iusto officiis, saepe magni dignissimos at nostrum est consequatur impedit non? Tenetur veniam atque consequatur perspiciatis quo commodi possimus, nostrum velit eligendi quas cupiditate......
                                    </p>
                                    <div class="d-flex justify-content-end">
                                    <a href="/profile/course_view.php?crs_id=" class="btn btn-primary mx-3">View Course</a>
                                      <a href="/profile/feedback.php?crs_id=" class="btn btn-secondary">Feedback</a>
                                    
                                      
                                    </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- course card end -->
                      </div>
<!--//-------------------------------------------feedback panel--------------------------------->
                      <div class="tab-pane " id="timeline">
                        
                        <!-- Post -->
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="/admin/_assets/crs_thum/" alt="user image">
                            <span class="username">
                              <a href="#">kdlslssl</a>
                              <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                            </span>
                            <span class="description">Time - 12-15-4578</span>
                          </div>
                          <!-- /.user-block -->
                          <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit, adipisci?
                          </p>

                        </div>
                        <!-- /.post -->

                      

                        






                      </div>
                      <!-- /.tab-pane -->

                      <div class="tab-pane" id="settings">
                        <form class="form-horizontal" method="post" action="">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="name" name="name" value="" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" readonly name="email" value="" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Occupation</label>
                            <div class="col-sm-10">
                              <input type="text" name="occupation" value="" class="form-control" id="" placeholder="What You Doing Now">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                              <input type="text"  name="city" value=""  class="form-control" placeholder="Your city" id="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                              <input type="text"  name="phone" value="" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills"  class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                              
                              
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
          <!-- /.col -->











          
            <!-- <div class="col-md-9 py-3">
             
                <div class="card">
                  <div class="card-body">
                  <form class="form-horizontal" method="post" action="">
                          <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                              <input type="name" name="name" value="" class="form-control" id="inputName" placeholder="Name">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" readonly name="email" value="" class="form-control" id="inputEmail" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Occupation</label>
                            <div class="col-sm-10">
                              <input type="text" name="occupation" value="" class="form-control" id="" placeholder="What You Doing Now">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-10">
                              <input type="text"  name="city" value=""  class="form-control" placeholder="Your city" id="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                              <input type="text"  name="phone" value="" class="form-control" id="inputSkills" placeholder="Skills">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputSkills"  class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                              <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                              
                              
                            </div>
                          </div>
                          
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                          </div>
                        </form>
                  </div>
                </div>
            </div> -->
        
                      
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

</div>
<!-- /.content-wrapper -->


<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>



@endsection