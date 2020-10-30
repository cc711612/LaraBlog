@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit Post</h2>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                            {{$error}}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success">
                Updated Successfully!
            </div>
            @endif
            <form action = "{{ route('posts.update',[$post->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" required="required" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content" id="content" required="required" rows="5">{{$post->content}}</textarea>
                </div>
                <div class="text-center">
                    <button class="btn btn-primary">Update</button>
                </div>
                
            </form>
            <hr>
            <form action="{{route('posts.destroy',[$post->id])}}" method="POST" onsubmit="return confirm('確定要刪除?')">
                @method('delete')
                @csrf
                <div class="text-center">
                    <button class="btn btn-danger ">Delete This Post</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    CKEDITOR.replace('content');
    // console.log('123');
</script>
@endsection
