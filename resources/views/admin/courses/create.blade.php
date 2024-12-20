@extends("admin.layout.layout")

@section('main')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Course</h1>
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
                            <form action="{{ route('admin.course.create')}}" method="post"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name"
                                        value="{{ old('name')}}" id=""
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Author</label>
                                    <select name="author" id=""
                                        class="form-control @error('author') is-invalid @enderror">
                                        <option value="">Select Instructor</option>

                                        @foreach ($instructors as $inst)
                                            <option value="{{ $inst->id }}" @selected(old('author') == $inst->id)>{{ $inst->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('author')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Duration</label>
                                    <input type="text" name="duration"
                                        value="{{ old('duration')}}" id=""
                                        class="form-control @error('duration') is-invalid @enderror">
                                    @error('duration')
                                        <div class="mt-1 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="">Original Price</label>
                                    <input type="text" name="price"
                                        value="{{ old('price')}}" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Selling Price</label>
                                    <input type="text" name="sell_price"
                                        value="{{ old('sell_price')}}" id=""
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" id="" cols="30"
                                        rows="10">{{ old('description')}}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Thumbnail</label>
                                    <input type="file" name="img" id="" class="form-control">
                                    <!-- file_exists(asset() -->
                                    @if($edit && $course->thum)

                                        <img class="mt-2" src="{{ asset('storage') . '/' . $course->thum }}" width="100px"
                                            alt="">
                                    @endif


                                </div>


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