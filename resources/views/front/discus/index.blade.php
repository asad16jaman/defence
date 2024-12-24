@extends('front.layout.layout')


@section('main')

<div class="container" style="margin-top:50px">
        <div class="row">
             <div class="col-lg-10 col-12 offset-lg-1">
                <div class="row">
                    @foreach ($catagories as $catagory )
                        <div class="col-6 col-md-4 mt-5">
                            <div class="card" style="width: 18rem;">
                                <img style="height:161px;object-fit:cover" src="{{ asset('/forum/thum').'/'.$catagory->thumbnail}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $catagory->name }}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="{{ route('discus.threadlist',$catagory->id)}}" class="btn btn-primary">Start Discussion</a>
                                </div>
                            </div>    
                        </div>
                    
                    @endforeach
                </div>
             </div>
        </div>
    </div>

@endsection


