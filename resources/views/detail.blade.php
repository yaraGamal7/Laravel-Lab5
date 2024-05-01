<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><table class='table table-striped'>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Posted By</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $post['id'] }}</td>
            <td>{{ $post['title'] }}</td>
            <td>{{ $post['body'] }}</td>
            <td>{{ $post->user->name }}</td>
        </tr>
    </tbody>
</table>
