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

    $title=$_POST['title'];
    $author=$_POST['author'];
    $date=$_POST['date'];
    $id = $_SESSION['id_member'];


    $sql = "INSERT INTO `book`(`title`,`author`,`published_date`,`id_member`) VALUES('$title','$author','$date','$id') ";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Added');document.location.href='main.php';</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  

    




?>