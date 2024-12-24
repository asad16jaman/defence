@extends('front.layout.layout')
@section('title')
    threed page
@endsection

@section('style')
<style>

.jumbotron{
            background: linear-gradient(rgba(0,0,0,0.4),rgb(0, 0, 0,0.3)),url({{ asset('forum').'/thum/'.$catagory->thumbnail}}) no-repeat center/cover;
            padding: 67px 26px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .media{
            display:flex;
        }
        .media-body{
            flex-grow: 1;
            flex-shrink: 10;
            padding-left:10px;
        }
</style>

@endsection


@section('main')
    <div class="container" style="margin-top:80px;">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="jumbotron" >
                    <h1 class="text-light">Wellcome to {{ $catagory->name }} discussion  forum</h1>
                    <hr>
                    <p class="">
                        Ask Your Question below form 
                    </p>
                </div>

                    @auth
                    <form action="{{ route('discus.storequestion' ,$catagory->id )}}" id="threadForm" method="POST" class="img-thumbnail p-4">
                        <div class="form-group">
                            @csrf
                            <label for="exampleInputEmail1">Problame Title</label>
                            <input type="text" name="title" placeholder="Ask question or your problame" class="form-control"
                                id="exampleInputTitle" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Problame Discription</label>
                            <textarea name="discription" placeholder="discribe your problame" id="" cols="10" rows="5"
                                class="form-control"></textarea>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-2" id="submitbtn">Submit</button>
                        </div>
                    </form>
                    @else
                        <div class="alert alert-success d-flex justify-content-between">
                        You need to logged in
                        <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
                        </div>
                    @endauth
            </div>
            <div class="col-md-4 col-0">
            <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <h1>Forums Rules</h1>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        Be civil. Don't post anything that a reasonable person would consider offensive, abusive, or
                        hate speech.
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Keep it clean. Don't post anything
                        obscene or sexually explicit.</a>
                    <a href="#" class="list-group-item list-group-item-action">Respect each other. Don't harass or grief
                        anyone, impersonate people, or expose their private information.</a>
                    <a href="#" class="list-group-item list-group-item-action">Respect our forum.</a>

                </div>
            </div>
        </div>


        @foreach ($threads as $thread)
        
       
        <div class="row mt-1 bg-light p-2">
            <div class="media">
                <div><img class="mx-2 circle" src="{{ asset('/assets/img/profile.png')}}" width="50px" alt="image"> </div>
                <div class="media-body">
                    <div class="d-flex justify-content-between">
                        <p>{{ $thread->user->email }}</p>
                        <p><span> {{ date('d-m-Y , h:ia',strtotime($thread->created_at)) }}</span></p>
                    </div>

                    <div>
                        <a href="{{ route('discus.comment',$thread->id)}}">{{ $thread->title }}</a>
                        <p>{{ $thread->description }}</p>
                        @can('threadEditDelete',$thread)
                            <div class="d-flex justify-content-end">
                                
                                <button class="btn btn-primary mx-2" onclick="editThread.call(this)" q_id ="{{$thread->id}}"><i class="fa-solid fa-pen-to-square"></i></button>
                                
                                <form action="{{ route('threadDelete',['catId'=>$catagory->id,'threadId'=>$thread->id])}}" method="post">
                                        @csrf

                                        <button type="button" onclick="confirm('Are you sure you want to delete this user?') ? this.parentElement.submit() : ''" class="btn btn-danger mx-2"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>


        @endforeach





        
        
        


    </div>
@endsection

@push('js')
    <script>

        function editFromOnClick(title,description,commentLink,threadId){
            return `
                <input type="text" name="eidt_title" class="form-control mb-3" value="${title}">
                <textarea name="edit_Description" class="form-control mb-3"  >${description}</textarea>
                <button class="btn btn-primary" onclick="updateThread.call(this,${threadId})" commentLink="${commentLink}" threadId=${threadId}>Update</button>
                <button class="btn btn-success" onclick="cancleEdit.call(this,'${title}')" commentLink="${commentLink}" threadId=${threadId}>Cancle</button>
            `
        }

        function cardbody(commentLink,title,description,threadId,deleteLink){
            return `<a href=${commentLink}>${title}</a>
                        <p>${description}</p>
                        <div class="d-flex justify-content-end">
                        <button class="btn btn-primary mx-2" onclick="editThread.call(this)"  q_id ="${threadId}"><i class="fa-solid fa-pen-to-square"></i></button>
                        <form action="${deleteLink}" method="post">
                                        @csrf

                                        <button type="button" onclick="confirm('Are you sure you want to delete this user?') ? this.parentElement.submit() : ''" class="btn btn-danger mx-2"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                        </div>
                        
                        `

        }
        
        

        function editThread(){
           
            let a = $(this).parent().parent().children()[0];
            let title = a.innerHTML;
            let commentLink = a.href;
            let threadId = $(this).attr('q_id');
            let description = $(this).parent().parent().children()[1].innerHTML;
            $(this).parent().parent().html(editFromOnClick(title,description,commentLink,threadId)) 
        }

        function cancleEdit(title){
            let sibling = $(this).siblings();
            let description =sibling[1].innerHTML;
            //threadId and comment in cancle button as attribute
            let commentLink = $(this).attr('commentLink')
            let threadId = $(this).attr('threadId')
            
            let deleteLink = "{{ route('threadDelete',['catId'=>$catagory->id,'threadId'=>'ID'])}}";
            deleteLink =deleteLink.replace('ID',threadId);
            $(this).parent().html(cardbody(commentLink,title,description,threadId,deleteLink))
        }



        function updateThread(id){
            let url = "{{ route('discus.updateQuestion',['id'=>"ID"])}}";
            url = url.replace('ID',id);
            let updateform = $(this).siblings()


            let commentLink = $(this).attr('commentLink')
            let threadId = $(this).attr('threadId')
            let deleteLink = "{{ route('threadDelete',['catId'=>$catagory->id,'threadId'=>'ID'])}}";
            deleteLink =deleteLink.replace('ID',threadId);
            
            let ob = {
                title : updateform[0].value,
                description : updateform[1].value
            }

            let updatebtn = $(this);
            

            $.ajax({
                method:'POST',
                url:url,
                dataType:'json',
                data:ob,
                success:function(res){
                    if(res.success){
                        updatebtn.parent().html(cardbody(commentLink,res.data.title,res.data.description,threadId,deleteLink))
                       
                    }
                },
                error:function(jqXHR,exception){

                }
                

            })


           




        }



    </script>
@endpush



