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
    </div>
    
    <script>
        console.log('Blog post loaded:', '{{ $blog->title }}');
    </script>
</body>
</html>
