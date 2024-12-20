@extends('profile.layout.layout')

@section("main")



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    

    <!-- Main content -->

    <!-- /.content -->

    <section>
  
        <div class="container-fluid">
             <!-- /.row -->
        <div class="row px-3 py-3">
            <div class="col-md-6 col-12 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center"> Change Password</h3>
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="">email</label>
                            <input type="email" name="email" readonly value="" id="" class="form-control">
                            <p>this field is not changable</p>
                        </div>
                        <div class="mb-3">
                            <label for="">Current Password</label>
                            <input type="password" name="c_password"   id="" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">New Password</label>
                            <input type="password" name="password"  id="" class="form-control">

                        </div>
                        <div class="mb-3">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" id="" class="form-control">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Chang</button>
                        </div>

                    </form>
                </div>
            </div>
            </div>
          
        </div>
        <!-- /.row -->
        
		
        </div>
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