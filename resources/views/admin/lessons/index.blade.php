@extends("admin.layout.layout")

@section('main')


@if($course)
<a href="{{ route('admin.lesson.create',$course) }}"  class="btn btn-danger" style="position:fixed;bottom:60px;right:10px"><i class="fa fa-plus" aria-hidden="true"></i><a/>
@endif

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">

            <form action="{{ route('admin.lesson') }}" method="get">
                <div class="row mb-2">
                    <div class="col-md-6 offset-md-3">
                            <div class="d-flex" style="height:37px">
                                <div class="form-group w-75">
                                    <input type="text" class="form-control py-2" name="crs" id="" placeholder="inter Course ID">
                                </div>
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                    </div>
                </div><!-- /.row -->

            </form>

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
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Lesson Id</th>
                      <th>Lesson Name</th>
                      <th>Video</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if($course)
                      @foreach ($lessons as $key=>$lesson)
                      <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $lesson->name }}</td>
                      <td>{{ $lesson->video }}</td>
                   
                      <td>
                        <form action="" method="post" onclick="return confirmDelete()">
                            <a href="" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>

                          <input type="hidden" name="delete_id" value="">
                            <button type="submit"  class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                            </button>
                       </form>
                      </td>                    
                    </tr>
                      
                      @endforeach


                    @endif
                      
                   
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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