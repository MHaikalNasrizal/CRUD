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

    $id=$_POST['delete'];

    $sql = "DELETE FROM book WHERE id_book = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Deleted');document.location.href='main.php';</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  


?>