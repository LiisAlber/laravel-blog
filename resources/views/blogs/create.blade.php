<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
</head>
<body>
    <div class="container">
        <h1>Create Blog Post</h1>
        <form action="{{ route('blogs.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('createBlogForm').onsubmit = function(event) {
            var title = document.getElementById('title').value;
            var description = document.getElementById('description').value;
            
            if (title.trim() === '' || description.trim() === '') {
                alert('Title and description are required.');
                event.preventDefault(); // Prevent form submission
            }
        }
    </script>
    
</body>
</html>
