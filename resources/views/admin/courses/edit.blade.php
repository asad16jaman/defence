@extends("admin.layout.layout")

@section('main')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Course</h1>
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
                <div class="col-lg-6 col-md-8 col-12 offset-md-2 offset-lg-3">
                <div class="card py-3">
                    <h3 class="text-center">Course detail</h3>
                    <div class="card-body">
                        <form action="{{ route('admin.course.edit',$course->id)}}" method="post"  enctype="multipart/form-data">
                            @csrf
                            @include("admin.courses.form")
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
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