@extends('front.layout.layout')
@section('title')
threed page
@endsection

@section('style')
<style>
    .jumbotron {
        background: #80808045;
        /* padding: 67px 26px; */
        padding: 10px 20px;
        border-radius: 10px;
        margin-bottom: 30px;
    }

    .media {
        display: flex;
    }

    .media-body {
        flex-grow: 1;
        flex-shrink: 10;
        padding-left: 10px;
    }

    #likeIcon,
    #dislikeIcon {
        font-size: 25px;
        cursor: pointer;
        border: none;
        background-color: transparent;

    }

    .likeBox {
        border: 2px solid pink;
        border-radius: 5px;
        padding: 0px 11px;
        margin: 0px 0px 0px 15px;
        border: 2px solid pink;
        border-radius: 5px;
        padding: 0px 11px;
        margin: 0px 0px 0px 15px;
        display: flex;
    }

    .likeBox p {
        padding: 8px 10px;
        margin-bottom: 0;
    }
</style>

@endsection


@section('main')


<div class="container" style="margin-top:80px">
    <div class="row mt-1 mb-3">
        <div class="col-md-8">
            <div class="jumbotron">
                <div class="card p-3">
                    <div  class="d-flex card-header">
                    <p style="color:#009fff;font-weight:700">Problame Title: </p>
                    <p style="padding:0 5px"> {{$thread->title}}</p>
                    </div>
                    <div class="card-body d-flex">
                        <p style="color:#009fff;font-weight:700">Description: </p>
                        <p style="text-align:justify;padding:0px 13px"> {{ $thread->description  }} </p>
                    </div>
                </div>
                

                <hr>
                <p class="lead">
                   Give Sollution From Bellow.
                </p>
            </div>
            <div>
                @auth
                    <form action="" method="POST" id="comment_form" class="img-thumbnail p-4">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sollution Discription</label>
                            <textarea name="discription" placeholder="write sollution hare" id="description" cols="10"
                                rows="5" class="form-control"></textarea>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </div>
                    </form>
                @else
                    <div class="alert alert-success d-flex justify-content-between">
                        Want to answer? You need to logged in
                        <a href="{{ route('login')}}" class="btn btn-primary">Login</a>
                    </div>

                @endauth

            </div>
        </div>
        <div class="col-md-4">
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




    <div class="commentContainer" id="commentContainer">
        @forelse($thread->comments as $comment)

            <div class="row mt-1 bg-light px-5 py-3">
                <div class="media">
                    <img class="mr-3" src="{{ asset('/assets/img/profile.png')}}" width="50px" height="50px" alt="image">
                    <div class="media-body">
                        <div class="d-flex justify-content-between">
                            <p>{{$comment->user->email}}</p>
                            <span class="mx-5">{{ date('d-m-Y , h:ia', strtotime($comment->created_at)) }}</span>
                        </div>
                        <div class="media_content">
                            <p>{{ $comment->content }}</p>
                            @auth
                                <div class="d-flex justify-content-end">
                                    @can('commentEditDelete', $comment)
                                        <button class="btn btn-success" onclick="editComment.call(this,{{$comment->id}})"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button class="btn btn-danger mx-3" onclick="deleteComment.call(this,{{$comment->id}})"><i
                                                class="fa-solid fa-trash-can"></i></button><!-- delete -->
                                    @endcan
                                    @cannot('commentEditDelete', $comment)
                                    <div class="likeBox">
                                        <p>{{ $comment->likes->count() }}</p>
                                        <button id="likeIcon" onclick="likeComment.call(this,{{$comment->id}})"> <i
                                                class="fa-solid fa-thumbs-up text-primary"></i></button>
                                    </div>
                                    @endcannot

                                </div>

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>there is no answer yet</p>
        @endforelse


    </div>

</div>



@endsection

@push('js')
    <script>

        function addNewRow(content, id) {
            @auth
                return `<div class="row mt-1 bg-light px-5 py-3">
                            <div class="media">
                                <img class="mr-3" src="{{ asset('/assets/img/profile.png')}}" width="50px" alt="image">
                                <div class="media-body">
                                    <div class="d-flex justify-content-between">
                                        <p>${"{{auth()->user()->email}}"}</p>
                                        <span class="mx-5">{{ date('d-m-Y , h:ia', strtotime(time())) }}</span>
                                    </div>
                                    <div class="media_content">
                                        <p>${content}</p>
                                         <div class="d-flex justify-content-end">
                                            <button class="btn btn-success" onclick="editComment.call(this,${id})"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger mx-3" onclick="deleteComment.call(this,${id})"><i class="fa-solid fa-trash-can"></i></button>
                                         </div>
                                    </div>
                                </div>
                            </div>
                        </div>`
            @endauth
        }

        $("#comment_form").submit(function (e) {
            e.preventDefault();
            let jsonData = $(this).serialize();
            let url = "{{ route('comment.store', $thread->id)}}"

            $.ajax({
                method: 'POST',
                url,
                dataType: 'json',
                data: jsonData,
                success: function (res) {

                    let create_at = ""
                    if (res.success) {
                        $('#commentContainer').prepend(addNewRow(res.data.content, res.data.id))
                    }
                    $('#description').val('')

                }
            })

        })

        function deleteComment(id) {
            if (confirm("Are you sure to delete this comment ? ")) {
                let url = "{{ route('comment.delete', ['id' => 'ID'])}}";
                url = url.replace('ID', id);
                let card = $(this).parent().parent().parent().parent().parent();
                $.ajax({
                    method: "post",
                    url,
                    body: {},
                    dataType: 'json',
                    success: function (res) {
                        if (res.success) {
                            card.remove()
                        }
                    }
                })
            }

        }

        function editComment(id) {

            let parent = $(this).parent()
            let txt = parent.siblings()[0].innerHTML;
            let commentForm = `
                    <div>
                        <textarea name="description" id="" class='form-control'>${txt}</textarea>
                        <button class="btn btn-primary mt-3" onclick="updateComment.call(this,${id})">update</button>
                         <button class="btn btn-danger mt-3" onclick="cancleCommentUpdate.call(this,${id})">cancle</button>
                    </div>
                `
            parent.parent().html(commentForm)
        }

        function cardContent(description, id) {
            return `
                    <p>${description}</p>
                    <div class="d-flex justify-content-end"> 
                        <button class="btn btn-success" onclick="editComment.call(this,${id})"><i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="btn btn-danger mx-3" onclick="deleteComment.call(this,${id})"><i class="fa-solid fa-trash-can"></i></button>
                    </div>

                `
        }

        function cancleCommentUpdate(id) {
            let txt = $(this).siblings()[0].innerHTML;
            $(this).parent().parent().html(cardContent(txt, id))
        }

        function updateComment(id) {
            // 
            let updateUrl = "{{ route('comment.update', ['id' => 'ID'])}}";
            updateUrl = updateUrl.replace('ID', id);
            let ob = {
                content: $(this).siblings()[0].value,
                _token: "{{csrf_token()}}"
            }
            let cardbody = $(this).parent().parent();
            $.ajax({
                method: "POST",
                url: updateUrl,
                dataTyp: "json",
                data: ob,
                success: function (res) {
                    if (res.success) [
                        cardbody.html(cardContent(ob.content, id))
                    ]
                }

            });
        }

        function likeComment(id) {
            let likeUrl = "{{ route('like.add', ['id' => "ID"])}}";
            likeUrl = likeUrl.replace('ID', id);
            let currentLike = $(this).siblings()[0];
            console.log(currentLike)
            $.ajax({
                method: "post",
                url: likeUrl,
                dataType: 'json',
                data: { _token: "{{csrf_token()}}" },
                success: function (res) {
                    if (res.success) {
                        currentLike.innerHTML = parseInt(currentLike.innerHTML) + 1
                    } else {
                        currentLike.innerHTML = parseInt(currentLike.innerHTML) - 1
                    }

                }
            })
        }




    </script>
@endpush