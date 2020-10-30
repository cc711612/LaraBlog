@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($datas as $post)
            <div class="card">
                <div class="card-header">
                    #{{$post->id}} {{$post->title}} - {{$post->created_at}}
                    <div class="text-right">
                        @auth
                        @if($post->admin)
                        <a href="{{ route('posts.edit',[$post->id])}}" class=" btn btn-primary pull-right">Edit</a>
                        @endif
                        @endauth
                    </div>
                </div>
                <div class="card-body">
                    {!! mb_substr((strip_tags($post->content)),0,10,'UTF-8')!!}
                    <a href="./content/{{$post->id}}">
                        <div class="go text-right">更多<i class="fas fa-angle-right ml-2"></i></div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
