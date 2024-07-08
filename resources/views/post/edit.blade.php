<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Edit Post</h3>
                    </div>
                    <div class="card-body">

                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif

                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" value="{{$post->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea name="content" class="form-control" rows="5" required>{{ $post->content}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{route('posts')}}"><button type="button" class="btn btn-primary">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>