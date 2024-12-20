@extends("admin.layout.layout")

@section("main")

<a href="./add_student.php" class="btn btn-danger" style="position:fixed;bottom:30px;right:50px;z-index:789"><i class="fa fa-plus" aria-hidden="true"></i></a>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Users</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->

    <!-- /.content -->

    <section>
        <div class="container-fluid">
             <!-- /.row -->
        <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Students</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th style="width: 40px">Occupation</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key=>$user)
                    <tr>
                      <td>{{ $key }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email}}</td>
                      <td>Student</td>
                      <td>
                      <form action="" method="post" onclick="return confirmDelete()">
                            <!-- <a href="#" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->
                             <input type="hidden" name="delete_id" value="">
                            </a>
                            <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>

                      </td>
                    </tr>
                    
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
               
                </ul>
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