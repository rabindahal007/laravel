<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Add a New Book</h2>
        <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="Book_Name" placeholder="Enter book title" required>
            </div>
            <div class="form-group">
                <label for="body">Book Description</label>
                <textarea class="form-control" id="body" name="Description" rows="5" placeholder="Enter book description"></textarea>
            </div>
            <div class="form-group">
                <label for="link">Book Link</label>
                <input type="text" class="form-control" id="link" name="Book_Link" placeholder="Enter book link" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="Category" required>
                    <option value="" disabled selected>Select category</option>
                    <option value="Self-Help">Self-Help</option>
                    <option value="Religious">Religious</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Dark-Romance">DArk-Romance</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
</body>
</html>
