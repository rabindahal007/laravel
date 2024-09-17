
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
                    <h2 class="card-title">Edit</h2>
                    
                    <form method="post" action="{{route('product.update',['product' =>$product])}}" >
                     @csrf
                     @method('put')
                    
                        <div class="form-group">
                            <label for="productName">Name:</label>
                            <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="name" value="{{$product->name}}">
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Price:</label>
                            <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" name="price" value="{{$product->price}}">
                        </div>
                        <div class="form-group">
                            <label for="productQuantity">Quantity:</label>
                            <input type="number" class="form-control" id="productQuantity" placeholder="Enter product quantity" name="quantity" value="{{$product->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Description:</label>
                            <textarea class="form-control" id="productDescription" rows="4" placeholder="Enter product description" name="description" value="{{$product->description}}"></textarea>
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
