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

    $book_id = $_POST['id_book'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $id = $_SESSION['id_member'];


    $sql = "UPDATE `book` SET title = '$title',author = '$author',published_date ='$date',id_member='$id' WHERE id_book='$book_id'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Updated');document.location.href='main.php';</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  

    




?>