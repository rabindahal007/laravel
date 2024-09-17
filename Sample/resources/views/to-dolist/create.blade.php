<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style to center the box */
        .center-box {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh; /* Half of the viewport height */
        }
        body {
  background: #7CB9E8;
  /* Adjust the colors as per your preference */
  margin: 0; /* To remove default margin */
  padding: 0; /* To remove default padding */
}

    </style>
</head>

<body>
  @if($errors->any())
                    <ul>
                       @foreach ($errors->all() as $error)
                       <li>{{$error}}</li>
                           
                       @endforeach
                 
                 
                    </ul>
  
  @endif
   
    <div class="container center-box">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Enter your goal for today</h2>
                    
                     <form method="post" action="{{route('to-dolist.store')}}" >
                         @csrf
                         @method('post')
                    
                        <div class="form-group">
                            <label for="productName">Description:</label>
                            <input type="text" class="form-control" id="productName" placeholder="Enter description " name="name">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery links here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
