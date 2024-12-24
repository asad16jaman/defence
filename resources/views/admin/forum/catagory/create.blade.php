@extends("admin.layout.layout")

@section('main')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->

    <section>
        <div class="container-fluid">
             <!-- /.row -->
        <div class="row px-3 py-3">
          <div class="col-md-8 col-12 offset-md-2">
           
            <!-- /.card -->
            <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">Catagory Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('catagory_store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Title</label>
                                    <input type="text" name="name" value="{{ old('name')}}" placeholder="inter Topic" class="form-control @error('name') is-invalid   @enderror " id="name">
                                    @error("name")
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" id="" class="form-control" rows="7" cols="" placeholder="inter about topic">{{old('description')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Thumbnail</label>
                                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid  @enderror" id="">
                                    @error('thumbnail')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="submit" value="Submit" class="btn btn-success">
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
