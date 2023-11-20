<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    
</head>
<body>
    <div class="container">
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
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-primary btn-sm">View</a>
                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <!-- Delete button -->
                            <button onclick="deleteConfirm('{{ $blog->id }}')" class="btn btn-danger btn-sm">Delete</button>

                            <!-- Hidden form for delete -->
                            <form id="delete-form-{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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
