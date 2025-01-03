@extends("admin.layout.layout")

@section('main')


@if($course)
<a href="{{ route('admin.lesson.create', $course) }}"  class="btn btn-danger" style="position:fixed;bottom:60px;right:10px"><i class="fa fa-plus" aria-hidden="true"></i><a/>
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







      <!-- Button trigger modal -->
      














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
              @foreach ($lessons as $key => $lesson)
          <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $lesson->name }}</td>
          <td>{{ $lesson->video }}</td>

          <td class="d-flex">
                <a href="{{ route('admin.lesson.edit',$lesson->id) }}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#modalDanger{{$lesson->id}}">
                <i class="fa-solid fa-trash"></i>
                </button>
                <!-- Modal delete lesson  -->
                <div class="modal fade" id="modalDanger{{$lesson->id}}" style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-danger">
                  <form action="{{ route('admin.lesson.delete',$lesson->id) }}" method="post">
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