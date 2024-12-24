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
            <div class="col-md-8 col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            @if($current_lesson)
                            <video width="100%" height="100%" controls>
                                    <source src="{{ asset('storage').'/'.$current_lesson->video }}">
                                </video>
                            @elseif(count($course->lessons)>0)
                                <video width="100%" height="100%" controls>
                                    <source src="{{ asset('storage').'/'.$course->lessons[0]->video }}">
                                </video>
                            @else
                                <p>There is no lesson to show</p>

                            @endif
                            
                        </div>
                    </div>

                    <!-- //description card -->
                    <div class="card my-3">
                        <div class="card-header text-center">
                            <h4>Lesson Description</h4>
                        </div>
                        <div class="card-body">
                            @if($current_lesson)
                            {{$current_lesson->description }}
                            @elseif(count($course->lessons)>0)
                                {{$course->lessons[0]->description }}
                            @else
                            <p>There is no lesson to show</p>

                            @endif

                            
                        </div>
                    </div>
                     <!-- //description card -->
            </div>
            <div class="col-md-4 col-12">
                
                <div class="card">
                    <div class="card-header">
                      
                       <p>lesson:</p>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @if(count($course->lessons)>0)
                                @foreach ($course->lessons as $key=>$lesson)
                                    @if((!$current_lesson && $key == 0 ) || $current_lesson->id == $lesson->id)
                                    <li class='list-group-item active'><a style='color:#ffffff' href='{{ route('profile.course',['id'=>$course->id,'lesson'=>$lesson->id]) }}' >{{ $lesson->name }}</a></li>
                                    @else
                                    <li style="" class='list-group-item '><a href='{{ route('profile.course',['id'=>$course->id,'lesson'=>$lesson->id]) }}' >{{ $lesson->name }}</a></li>
                                    @endif
                                @endforeach
                               
                            @else
                            <p>there is no lesson to show</p>

                            @endif
                           
                               
                            
                            
                        </ul>
                    </div>
                </div>

                
            </div>


            <?php

                
            ?>

        </div>
        <div class="row">
            <div class="col-12 ">
               
            </div>
        </div>
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