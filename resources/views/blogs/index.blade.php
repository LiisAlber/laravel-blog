<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    
</head>
<body>
    <div class="container mt-4">
        <h1>Blog Posts</h1>
        <a href="{{ route('blogs.create') }}" class="btn btn-success mb-3">Create New Post</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ Str::limit($blog->description, 50) }}</td>
                        <td>
                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
                            <button onclick="deleteConfirm('{{ $blog->id }}')" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No blog posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function deleteConfirm(blogId) {
            if(confirm('Are you sure you want to delete this post?')) {
                document.getElementById('delete-form-' + blogId).submit();
            }
        }
    </script>
</body>
</html>

@foreach ($blogs as $blog)
    <div class="blog-post">
        <!-- Display blog post title, content, etc. -->

        @if (auth()->user() && auth()->user()->is_admin)
            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
    </div>
@endforeach
