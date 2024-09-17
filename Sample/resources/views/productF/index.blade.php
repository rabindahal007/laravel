<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h2>Product Table</h2> 
    <button class="btn btn-primary m-4 " ><a href="{{route('product.create')}}" class="text-light text-large"> Create</a></button>
    <div>
        
    </div>           
  <table class="table">
    <thead>
      <tr>
        <th>name</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>price</th>
        <th>Description</th>
        
      </tr>
    </thead>
    @foreach ($products as $product)
    <tr>
        <td>{{$product->id}}</td>
        <td>{{$product->name}}</td>
        
        <td>{{$product->quantity}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
      
        <td >
            <a href="{{route('product.edit', ['product'=>$product])}}">Edit</a>  
        </td>
        <td>
          <form action="{{route('product.destroy',['product' => $product])}}" method="post">
            @csrf
            @method('delete')
         <input value="delete" type="submit" class="btn btn-danger">
          </form>


        </td>



    </tr>
        
    @endforeach
    
  </table>
</div>
</body>
</html>
