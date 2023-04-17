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

    $id=$_POST['profile'];

    $sql = "SELECT * FROM member WHERE id_member = $id";

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
    <title>Update Profile</title>
</head>
<body>
    
    <h1>Update Profile</h1>
    <div class="container p-4">
        <form method="POST" action="updateprofile.php">
            <div class="row m-4">
                <label>id</label>
                <input class="form-control" name="id_member" value="<?php echo "$table[0]";?>" readonly="readonly">
            </div>
            <div class="row m-4">
                <label>Username</label>
                <input class="form-control" name="username" value="<?php echo "$table[1]";?>" required>
            </div>
            <div class="row m-4">
                <label>Password</label>
                <input class="form-control" type="password"name="password" required>
            </div>
        
            <div class="col m-4">
                <button class="btn btn-primary">Submit</button>
                <a href="main.php">back menu</a>
            </div>
            

        </form>
    </div>
    
</body>
</html>