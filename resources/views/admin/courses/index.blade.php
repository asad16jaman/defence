@extends("admin.layout.layout")

@section('main')
<a href="{{ route('admin.course.create') }}" class="btn btn-danger" style="position:fixed;bottom:60px;right:10px;z-index:22"><i class="fa fa-plus" aria-hidden="true"></i></a>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Courses</h1>
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
        <div class="row px-3 py-3">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Courses</h3>
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
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>                    
                      <th>Course Id</th>
                      <th>Course Name</th>
                      <th>Author</th>
                      <th>Action</th>
                      <th>Add Lessons</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($allCourses as $key=>$course)
                    <tr>
                      <td>{{ $key }}</td>
                      <td>{{ $course->name }}</td>
                      <td><a href="{{ $course->user->id }}">{{ $course->user->name }}</a></td>                  
                      <td>
                        <a href="{{route('admin.course.edit', $course->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                        <form action="" method="post" onclick="return confirmDelete()">
                            
                          <input type="hidden" name="delete_id" value="">
                            <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                      </td>
                      <td>
                        <a href="{{ route('admin.lesson', $course->id )}}" class="btn btn-danger">
                          <i class="fa fa-plus" aria-hidden="true"></i>
                        </a>
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
            <!-- /.card -->
            
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

<script>

function confirmDelete(){
  return confirm('Are you sure you want to delete this user?');
}

</script>

@endsection