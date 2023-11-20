<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }}</title>
   
</head>
<body>
    <div class="container">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->description }}</p>
        <a href="{{ route('blogs.index') }}" class="btn btn-info">Back to List</a>

        <!-- Delete button visible only to admin users -->
        @if(auth()->user() && auth()->user()->is_admin)
            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
            </form>
        @endif
    </div>
    
    <script>
        console.log('Blog post loaded:', '{{ $blog->title }}');
    </script>
</body>
</html>
