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
                        <h3 class="text-white">Create Post</h3>
                    </div>
                    <div class="card-body">

                        @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif

                        <form action="{{ route('posts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                @error('title')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea name="content" class="form-control" rows="5">{{ old('content')}}</textarea>
                                @error('content')
                                <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('posts')}}"><button type="button" class="btn btn-primary">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>