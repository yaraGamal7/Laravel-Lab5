<!-- createPost.blade.php -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
    <h1>Edit</h1>
    
    <form method="post" action="/posts">
        @csrf 

        <div class="mb-3">
            <label for="id" class="form-label">ID</label>
            <input type="number" class="form-control" id="id" name="id" aria-describedby="idHelp" >
            <div id="idHelp" class="form-text">Enter your ID.</div>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" ></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
