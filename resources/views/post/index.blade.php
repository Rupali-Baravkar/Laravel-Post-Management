<!-- @if($errors->any())
{!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
@endif
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif -->
<!DOCTYPE html>
<html>

<head>
    <title>Create Post</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline; margin-left: 1000px;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            <div class="col-md-12">
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                @if($errors->any())
                {!! implode('', $errors->all('<div class="text-danger">:message</div>')) !!}
                @endif

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Show</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $posts->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": false, 
                "info": false, 
                "pageLength": 5, // Number of entries per page
                "lengthChange": false,
            });
        });
    </script>
</body>

</html>