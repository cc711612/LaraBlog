@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Create Post</h2>
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
            <form action = "{{ route('posts.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" required="required">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea class="form-control" name="content"required="required" rows="5"></textarea>
                </div>
                <button class="btn btn-primary">Create</button>
            </form>
            
        </div>
    </div>
</div>
@endsection
