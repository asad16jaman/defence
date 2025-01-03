@extends("admin.layout.layout")

@section('main')


<div class="content-wrapper">
    

    <!-- /.content -->

    <section>
       
        <div class="container-fluid">
            
             <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 offset-md-2 offset-lg-3">
                


                <div class="card mt-3 shadow">
                    <div class="card-header">
                        <h3 class="card-title text-center">User Registration Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.create')}}" method="post">
                        @csrf 
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name='name' class="form-control @error('name') is-invalid @enderror" aria-label="Name" placeholder="type your name" value='{{ old('name') }}'>
                                        @error('name')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror 
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name='email' class="form-control @error('email') is-invalid @enderror" placeholder="inter Email" aria-label="Email" value='{{ old('email') }}'>
                                        @error('email')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">User Type</label>
                                        <select name="role" id="" class="form-control">
                                            <option value="user">User</option>
                                            <option value="instructor">Instructor</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                    



                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name='password' placeholder="password" class="form-control @error('password') is-invalid @enderror"
                                            aria-label="Password">
                                            @error('password')
                                            <p class='text-danger inputerror'>{{ $message }} </p>
                                            @enderror
                                    </div>

                                    

                                    
                                    <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Register</button>
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