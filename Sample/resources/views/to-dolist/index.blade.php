<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
body {
  background: #7CB9E8;
  /* Adjust the colors as per your preference */
  margin: 0; /* To remove default margin */
  padding: 0; /* To remove default padding */
}

    
</style>
<body background="##7CB9E8">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white" style="colo:#3650c5">
                        <h4 class="mb-0">To-Do List</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($lists as $list)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <input type="checkbox" id="myCheckbox" name="myCheckbox" value="yes">
                               
                                
                                <p>{{$list->name}}</p>
                                <form action="{{route('to-dolist.destroy',['list'=> $list])}}" method="POST">
                                    @csrf
                                    @method('delete')    
                               <input type="submit" value="delete" class="btn btn-danger"> 
                                </form>
                                
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                           
                            <div class="input-group-append">
                                <a href="{{route('to-dolist.create')}}">
                                <button class="btn btn-primary">Add</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
