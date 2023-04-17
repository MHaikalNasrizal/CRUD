<?php
    session_start();
    $servername = "localhost";
    $userdb = "root";
    $passworddb = "";
    $dbname = "library";
    $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);
 
 
    if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
 
 
    $username=$_POST['username'];
    $pwd=$_POST['password'];



    $sql = "SELECT * FROM member WHERE `Username` ='$username' AND `Password` ='".md5($pwd)."' ";
    $result = mysqli_query($conn, $sql);
    $table = mysqli_fetch_array($result,MYSQLI_NUM);
    
    
    if (mysqli_num_rows($result)>0){
        echo "<script>alert('Login Sucessfully. Welcome!');document.location.href='main.php';</script>";
        
        $_SESSION['username'] = $username;
        $_SESSION['id_member'] = $table[0];
    }else{
        echo "<script>alert('Wrong Username Or Password');document.location.href='login.html';</script>";
    }

?>