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

    $member_id = $_POST['id_member'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

     
    $sql = "SELECT * FROM member WHERE Username ='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        echo "<script>alert('Unsucessfully update. Username has been taken : Please use other username');document.location.href='main.php';</script>";
    }else{
        $sql = "UPDATE `member` SET username = '$username',`password` ='$password' WHERE id_member='$member_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Updated');document.location.href='main.php';</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  

    

    }
    


    




?>