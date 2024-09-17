<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Full-Screen Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <style>
        html, body {
            height: 100%;
            
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
 
<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- Sidebar Section -->
        <div class="col-md-4 bg-dark text-white d-flex flex-column justify-content-center align-items-center h-100">
           
            <div class="text-center">
                <h2 style="font-size: 40px">Application<br>Login Page</h2>
                <p>Login or register from here to access.</p>
            </div>
        </div>
        
        <!-- Main Section -->
        
       
        <div class="col-md-8 d-flex justify-content-center align-items-center h-100 ">
            @if($errors->has('login_failed'))
        <div class="alert alert-danger">
            {{ $errors->first('login_failed') }}
        </div>
    @endif
            
            <div class="col-md-6">
                <div class="card p-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf <!-- Laravel's CSRF protection token -->
                        <div class="form-group">
                            <label for="username">User Name</label>
                            <input type="text" class="form-control" id="username" placeholder="User Name" name="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                        <button type="submit" class="btn btn-secondary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
