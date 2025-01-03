@extends("admin.layout.layout")

@section("main")

<a href="{{ route('admin.users.create') }}" class="btn btn-danger" style="position:fixed;bottom:30px;right:50px;z-index:789"><i class="fa fa-plus" aria-hidden="true"></i></a>

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
                      <th style="width: 40px">Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $key=>$user)
                    <tr>
                      <td>{{ $key }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email}}</td>
                      <td>{{ $user->role }}</td>
                      <td>
                      <a href="{{ route('admin.users.edit',$user->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                      
                        <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalDanger{{$user->id}}">
                          <i class="fa-solid fa-trash"></i>
                          </button>
                          <!-- Modal delete lesson  -->
                          <div class="modal fade" id="modalDanger{{$user->id}}" style="display: none;" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content bg-danger">
                            <form action="{{ route('admin.users.delete',$user->id) }}" method="post">
                            @csrf
                          
                            <div class="modal-body">
                            <p>Are you sure you want to delete…?</p>
                            </div>
                            <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancle</button>
                            <!-- <button type="button" class=""></button> -->
                            <input type="submit" value="Delete" class="btn btn-outline-light">
                            </div>
                            </form>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                          </div>

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