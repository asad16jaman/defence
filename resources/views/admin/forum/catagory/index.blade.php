@extends("admin.layout.layout")

@section('main')
<a href="{{ route('catagory_create') }}" class="btn btn-danger" style="position:fixed;bottom:60px;right:10px;z-index:22"><i class="fa fa-plus" aria-hidden="true"></i></a>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Threads</h1>
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
                <h3 class="card-title"> All Threads </h3>
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
              <table class="table">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Thumbnail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catagories as $catagory)
                    <tr>
                        <td>{{ $catagory->id }}</td>
                        <td>{{ $catagory->name }}</td>
                        <td>{{ substr($catagory->description,0,100)."..." }}</td>
                        <td>
                        <img  width="50px" class="img-thumbnail" src="{{ asset('/forum/thum/'.$catagory->thumbnail)}}" alt="">
                        </td>
                        <td>
                           <div style="display:inline-block;width:130px">
                         
                           <a href="{{ route('catagory_edit',$catagory->id)}}" class="btn btn-warning">Edit</a>
                           <!-- <button class="btn btn-danger">delete</button> -->
                           <a href="{{ route('catagory_delete',$catagory->id)}}" class="btn btn-danger">Delete</a>
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


@endsection
