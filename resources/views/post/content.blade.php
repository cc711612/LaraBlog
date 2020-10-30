@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>View Post</h2>
            <!-- 文章內容 -->
            <div class="card">
                <div class="card-header">
                    #{{$title}} 
                </div>
                <div class="card-body">
                    {!! nl2br($content)!!}
                </div>
            </div>
            <hr>
            <span>View Comments</span>
            <!-- 留言內容 -->
            <div class="comments">

                @foreach($comment as $comments)
                <div class="card-header" name="comments_{{$comments->id}}">
                    #{{$comments->indexs}} {{$comments->name}}({{$comments->email}})  - {{$comments->created_at}}</br>{{$comments->content}}
                </div>
                    @foreach($comments->reply as $replys)
                    <div class="card-body" style="" >
                        <span style="color:red">Reply</span>
                        {{$replys->name}}({{$replys->email}})  - {{$replys->created_at}}</br>{{$replys->content}}
                    </div>
                    @endforeach
                    @auth
                    <form action = "../reply/{{$id}}/{{$comments->id}}" method="POST">
                        @csrf
                        <input type="text" name="reply" id="reply_{{$comments->id}}" class="form-control reply_{{$comments->id}}" style="display: none" required="required">
                        <button class="btn btn-primary replybtn_{{$comments->id}}" onclick="sw_input('{{$comments->id}}');">reply</button>
                        <button class="reply_{{$comments->id}} btn btn-primary" style="display: none">submit</button>
                    </form>
                    </br>
                    @endauth
                @endforeach
            </div>
            <hr>
            @auth
            <span>Comments</span>
            <form action = "../comment/{{$id}}" method="POST">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content" id="content" required="required" rows="5"></textarea>
                </div>
                <button class="btn btn-primary" >submit</button>
            </form>
            @endauth
        </div>
    </div>
</div>
<script type="text/javascript">
    function sw_input(id) {
        console.log(id)
        //input顯示
        $(".reply_"+id).attr('style','display:block') 
        //btn隱藏   
        $(".replybtn_"+id).hide();
    }
</script>
@endsection
