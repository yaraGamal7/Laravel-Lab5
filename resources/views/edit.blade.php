<!-- createPost.blade.php -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
    <h1>Edit</h1>

    <form method="post" action="/posts/{{ $post['id'] }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ old('title', $post['title']) }}">
            @error('title')
                <p class="text-danger m-2">{{ $message }}</p>

                {{-- <div class="alert alert-danger mt-2">{{ $message }}</div> --}}
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input type="text" class="form-control" id="body" name="body" rows="3"
                value="{{ old('body', $post['body']) }}">
            @error('body')
                <p class="text-danger m-2">{{ $message }}</p>

                {{-- <div class="alert alert-danger mt-2">{{ $message }}</div> --}}
            @enderror
        </div>
        <div class="mb-3">
            {{-- <label for="user_id" class="form-label">user_id</label> --}}
            {{-- <input type="text" class="form-control" id="user_id" name="user_id" value="{{ old('user_id',$post['user_id']) }}"> --}}
            {{-- @error('user_id') --}}
            {{-- <p class="text-danger m-2">{{ $message }}</p> --}}

            <label for="" class="form-label">Post - image</label>
            <input type="file" class="form-control" name="image">

            @error('image')
                <p class="text-danger m-2">{{ $message }}</p>

                {{-- <div class="alert alert-danger mt-2">{{ $message }}</div> --}}
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
