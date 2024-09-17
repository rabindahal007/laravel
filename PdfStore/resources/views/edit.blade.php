<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Book</h2>
        <form action="{{ route('update', ['book' => $book->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="Book_Name" value="{{ old('Book_Name', $book->Book_Name) }}" required>
            </div>

            <div class="form-group">
                <label for="body">Book Description</label>
                <textarea class="form-control" id="body" name="Description" rows="5">{{ old('Description', $book->Description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="link">Book Link</label>
                <input type="text" class="form-control" id="link" name="Book_Link" value="{{ old('Book_Link', $book->Book_Link) }}" required>
            </div>

            <!-- Dropdown for Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="Category" required>
                    <option value="Self-Help" {{ $book->Category == 'Self-Help' ? 'selected' : '' }}>Self-Help</option>
                    <option value="Religious" {{ $book->Category == 'Religious' ? 'selected' : '' }}>Religious</option>
                    <option value="Fantasy" {{ $book->Category == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                    <option value="Dark-Romance" {{ $book->Category == 'Dark-Romance' ? 'selected' : '' }}>Dark-Romance</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($book->image)
                    <img src="{{ asset('images/' . $book->image) }}" class="img-fluid mt-2" alt="Current Image">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update Book</button>
        </form>
    </div>
</body>
</html>
