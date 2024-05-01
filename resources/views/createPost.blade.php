<!-- createPost.blade.php -->

{{-- 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
    <div class="container">
        <h1>Create a New Post</h1>

        <form method="POST" action="/posts" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    {{-- <div class="alert alert-danger mt-2">{{ $message }}</div> --}}
                    <p class="text-danger m-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="body" class="form-control" id="body" name="body" value="{{ old('body') }}">
                @error('body')
                    <p class="text-danger m-2">{{ $message }}</p>

                    {{-- <div class="alert alert-danger mt-2">{{ $message }}</div> --}}
                @enderror
            </div>

            <div class="mb-3">
               
                <label for="" class="form-label">Image</label>
                <input type="file" class="form-control" name="image">

                @error('image')
                    <p class="text-danger m-2">{{ $message }}</p>
                    {{-- <div class="alert alert-danger mt-2">{{ $message }}</div> --}}
                     {{-- <label for="user_id" class="form-label">user_id</label>
            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id') }}"> --}}
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        {{-- @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    </div>
@endsection
