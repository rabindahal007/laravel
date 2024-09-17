<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="{{route('log-in.store')}}" >
        @csrf
        @method('post');
        <label for="Name">Name</label>
        <input name="name" type="text">
        <label for="password">Password:</label>
        <input type="number" name="password">
        <label for="password"> Confirm Password:</label>
        <input type="number" name="confirmpassword">
        <input type="submit" value="Submit">



    </form>
    
</body>
</html>