<!DOCTYPE html>
<html>

<head>
    <title>Post Details</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('posts') }}" class="btn btn-primary mb-3">Back</a>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                    </tr>
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <img src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" alt="" height="100" width="100">
                        </td>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>