<?php
    session_start(); 
    if(isset($_SESSION['username'])){
    


    }else{
        echo "<script>alert('Session Ended .Please Login');document.location.href='login.html';</script>";
        die();

    }
     $servername = "localhost";
     $userdb = "root";
     $passworddb = "";
     $dbname = "library";
     $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);
 
     if (!$conn){
         die("Connection failed: " . mysqli_connect_error());
    }

    $id=$_POST['update'];

    $sql = "SELECT * FROM book WHERE id_book = $id";

    $result = mysqli_query($conn, $sql);

    $table = mysqli_fetch_array($result,MYSQLI_NUM);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Update Book</title>
</head>
<body>
    
    <h1>Update Book</h1>
    <div class="container p-4">
        <form method="POST" action="updatebook.php">
        <div class="row m-4">
                <label>id</label>
                <input class="form-control" name="id_book" value="<?php echo "$table[0]";?>" readonly="readonly">
            </div>
            <div class="row m-4">
                <label>Title</label>
                <input class="form-control" name="title" value="<?php echo "$table[1]";?>">
            </div>
            <div class="row m-4">
                <label>Author</label>
                <input class="form-control" name="author" value="<?php echo "$table[2]";?>">
            </div>
            <div class="row m-4">
                <label>Published date</label>
                <input type="date"class="form-control" name="date" value="<?php echo "$table[3]";?>">
            </div>

            <div class="col m-4">
                <button class="btn btn-primary">Submit</button>
                <a href="main.php">back menu</a>
            </div>
            

        </form>
    </div>
    
</body>
</html>