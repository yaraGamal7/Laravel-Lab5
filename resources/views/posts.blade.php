{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <table class='table table-striped'>
</head>

<body> --}}
@extends('layouts.app')
@section('title', 'Posts')
@section('content')
    <div class="container p-3">
        <a class="btn btn-primary mx-3" href="/posts/create">Creat Post</a>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Body</th>
                <th>Image</th>
                {{-- <th>Posted By</th> --}}
                <th>Add Comment</th>
                <th>Show All Comments</th>
                <th>action</th>
            </tr>

            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post['id'] }}</td>
                    <td>{{ $post['title'] }}</td>
                    <td>{{ $post['body'] }}</td>

                    <td>
                        {{-- @if (Str::startsWith($post['image'], 'https://'))
                            <img src="{{ $post['image'] }}" alt="Image" width="100px" height="100px">
                        @else --}}
                            <img src="{{ asset('images/' . $post['image']) }}" alt="Image" width="100px" height="100px">
                        {{-- @endif --}}
                    </td>
                    {{-- <td>{{ $post->user->id }}</td> --}}
                    <td>
                        <a class="btn btn-primary mt-2 " href="{{ route('comments.create', $post['id']) }}">Add Comment</a>
                    </td>

                    <td>
                        {{-- <a class="btn btn-primary mt-2"data-bs-toggle="modal"
                        data-bs-target="#modalId" >Show All Comment</a> --}}
                        <!-- Button trigger modal -->
                        <a class="btn btn-primary mt-2" href="{{ route('comments.index') }}">View Comments</a>

                    </td>

                    <td>

                        <a href="/posts/{{ $post['id'] }}" class="btn btn-info">Show</a>
                        <a href="/posts/{{ $post['id'] }}/edit" class="btn btn-primary">Edit</a>
                        <form action="/posts/{{ $post['id'] }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Delete" />
                        </form>

                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}

        </div>
        {{-- <div class="d-flex justify-content-center">
            {{ $posts->links('vendor.pagination.custom') }}
        </div> --}}
    </div>

@endsection
{{-- </table> --}}
