@extends("admin.layout.layout")

@section('main')
<!-- Main Sidebar Container -->


<!-- <button class="btn btn-danger" style="position:fixed;bottom:60px;right:10px"><i class="fa fa-plus" aria-hidden="true"></i></button> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- /.content-header -->

    <!-- Main content -->

    <!-- /.content -->

    <section>
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6 col-12 offset-md-3">
                    <div class="card my-3">
                        <div class="card-body">
                            <h3 class="text-center">Lesson Detail </h3>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="">Course Name</label>
                                    <input type="text" name="course_name" value="{{ $lesson->course->name }}" readonly
                                        id="" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Lesson Name</label>
                                    <input type="text" name="name" value="{{ old('name') ?? $lesson->name }}" id="" placeholder="leasson Name"
                                        class="form-control @error('name') is-invalid @enderror">

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="">Lesson Description</label>
                                    <textarea  name="description" class="form-control" id="" rows="6"
                                        cols="30">{{ old('description') ?? $lesson->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="">Lesson Video</label>
                                    <input  type="file" name="video" id="" class="form-control @error('video') is-invalid @enderror">
                                   
                                </div>
                                

                               
                                <div class="d-flex justify-content-end">
                                    
                                    <input type="submit" value="Add" class="btn btn-success mx-3">
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