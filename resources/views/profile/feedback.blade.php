@extends('profile.layout.layout')

@section("main")



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   

    <!-- Main content -->

    <!-- /.content -->

    <section>
 
        <div class="container-fluid">
             <!-- /.row -->
        <div class="row px-3 py-3">
            <div class="col-md-6 col-12 offset-md-3">
                <div class="card">
                    <div class="card-body">
                    <form action="" method="post">
                    <div class="mb-3">
                        <label for="">Feedback</label>
                        <textarea name="feedback" class="form-control" placeholder="Type Your important feedback" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Course</label>
                      
                            <!-- <select name="course_id" id="" class="form-control">
                                <option selected value=""</option>
                            </select> -->
                       
                            <select name="course_id" id="" class="form-control">
                                <option value="">Select Course*</option>
                                
                            </select>

                    
                        
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="submit" value="Submit" class="btn btn-primary">
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
    <strong>Copyright &copy; 2014-2021 <a href="">Asaduzzaman</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>




@endsection