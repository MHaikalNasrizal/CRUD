<?php 
    $servername = "localhost";
    $userdb = "root";
    $passworddb = "";
    $dbname = "library";
    $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);


    if (!$conn){
     die("Connection failed: " . mysqli_connect_error());
    }


    $username=$_POST['username'];
    $pwd=md5($_POST['password']);

    
    $sql = "SELECT * FROM member WHERE Username ='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        echo "<script>alert('Unsucessfully Register. Username has been taken');document.location.href='register.html';</script>";
    }else{
        $sql = "INSERT INTO `member`(`username`,`password`) VALUES('$username','$pwd') ";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Sucessfully Register. Now Login');document.location.href='login.html';</script>";
        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  
        $conn->close();

    }

    

?>