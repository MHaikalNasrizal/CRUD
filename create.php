<?php 
session_start(); 
if(isset($_SESSION['username'])){
    


}else{
    echo "<script>alert('Session Ended .Please Login');document.location.href='login.html';</script>";
    die();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>New Book</title>
</head>
<body>
    <h1>Create new Book</h1>
    <div class="container p-4">
        <form method="POST" action="createbook.php">
            <div class="row m-4">
                <label>Title</label>
                <input class="form-control" name="title">
            </div>
            <div class="row m-4">
                <label>Author</label>
                <input class="form-control" name="author">
            </div>
            <div class="row m-4">
                <label>Published date</label>
                <input type="date"class="form-control" name="date">
            </div>

            <div class="col m-4">
                <button class="btn btn-primary">Submit</button>
                <a href="main.php">back menu</a>
            </div>
            

        </form>
    </div>
    
</body>
</html>