<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .card img {
            height: 300px; 
            object-fit: cover; 
        }
        .card {
            font-family: cursive;
            transition: transform 0.8s ease;
        }
        .card-text {
            font-size: 15px;
        }
        .card:hover {
            transform: scale(1.1); /* Scales the item to 1.1 times its original size */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4); /* Adds a deeper shadow on hover */
        }
        .col-md-3 {
            margin-bottom: 30px;
        }
        .search-bar {
            margin: 20px 0;
        }
        .nav-right {
            display: flex;
            align-items: center;
        }
        .nav-right form {
            margin-left: 20px;
        }
    </style>
    <script>
        // JavaScript function for filtering books by title
        function searchBooks() {
            let input = document.getElementById('searchInput').value.toLowerCase();  // Get the search query
            let bookCards = document.getElementsByClassName('book-card');  // Get all book cards
            
            // Loop through all book cards
            for (let i = 0; i < bookCards.length; i++) {
                let bookTitle = bookCards[i].getElementsByClassName('book-title')[0].innerText.toLowerCase();  // Get the title text
                
                // Show or hide books based on the search input
                if (bookTitle.includes(input)) {
                    bookCards[i].style.display = "block";  // Show if title matches the input
                } else {
                    bookCards[i].style.display = "none";  // Hide if it doesn't match
                }
            }
        }

        // JavaScript function for filtering books by category
        function filterByCategory(category) {
            let bookCards = document.getElementsByClassName('book-card');
            
            for (let i = 0; i < bookCards.length; i++) {
                let bookCategory = bookCards[i].getAttribute('data-category');
                
                if (category === 'All' || bookCategory === category) {
                    bookCards[i].style.display = 'block';
                } else {
                    bookCards[i].style.display = 'none';
                }
            }
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-4 sticky-top">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                @if(session('user'))
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('add') }}">Add Books</a>
                </li>
                @endif
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('login') }}">Admin Panel</a>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <a class="dropdown-item" href="#" onclick="filterByCategory('All')">All</a>
                        <a class="dropdown-item" href="#" onclick="filterByCategory('Self-Help')">Self-Help</a>
                        <a class="dropdown-item" href="#" onclick="filterByCategory('Religious')">Religious</a>
                        <a class="dropdown-item" href="#" onclick="filterByCategory('Fantasy')">Fantasy</a>
                        <a class="dropdown-item" href="#" onclick="filterByCategory('Dark-Romance')">Dark-Romance</a>
                    </div>
                </li>
            </ul>

            <div class="nav-right ml-auto">
                <div class="search-bar">
                    <input type="text" id="searchInput" class="form-control" placeholder="Search books..." onkeyup="searchBooks()">
                </div>

                @if(session('user'))
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-secondary">Logout</button>
                </form>
                @endif
            </div>
        </div>
    </nav>

    <!-- Alert Messages -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->has('login_failed'))
    <div class="alert alert-danger">
        {{ $errors->first('login_failed') }}
    </div>
    @endif

    <!-- Book List -->
    <div class="container-fluid m-2 p-2">
        <div class="row">
            @foreach ($books as $book)
            <div class="col-md-3 book-card" data-category="{{ $book->Category }}">
                <div class="card bg-dark h-100">
                    <div class="card-body text-center text-light">
                        <img src="{{ asset('images/' . $book->image) }}" class="img-fluid mb-2" alt="Book Image">
                        <h2 class="book-title" style="font-size: 40px;">{{ $book->Book_Name }}</h2>
                        <p class="card-text">{{ $book->Description }}</p>
                        <hr>
                        <a href="{{ $book->Book_Link }}">
                          <button type="button" class="btn btn-info p-3 pl-5 pr-5" style="font-size: 20px">Read Now</button>
                        </a>
                        <hr>
                        <div class="d-flex justify-content-center">
                          @if(session('user'))
                              <a href="{{ route('edit', ['book' => $book->id]) }}">
                                  <button type="button" class="btn btn-primary p-2 mr-2">Edit</button>
                              </a>
                              <form action="{{ route('destroy', ['book' => $book->id]) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger p-2">Delete</button>
                              </form>
                          @endif
                      </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
