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
    $id = $_SESSION['id_member'];
    
    $sql = "SELECT * FROM book ";
    $result = mysqli_query($conn, $sql);
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Main</title>
    
</head>

<body>
    <script>
        function myconfirmed(){
            if(confirm("Are you sure you want to Delete?") == true){

            }else{
                return false;
            }

        }
    
        
    </script>

    <div class="container p-4">
        <h1>Welcome <?php echo $_SESSION['username'] ?> </h1>
        <div class="row ">
            <nav class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li class="nav-item"><a href="create.php">Create new book</a></li>
                    <li class="nav-item"><form method='POST' action='profileupdatepage.php'><button name='profile'type='submit' value='<?php echo" $id ";?>'>Update Profile</button></form></li>
                    <li class="nav-item"><a href="logout.php">Logout</a></li>

                </ul>
            </nav>
        </div>
        
    </div> 

    

    <div class="container p-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id_book</th>
                    <th scope="col">title</th>
                    <th scope="col">author</th>
                    <th scope="col">published_date</th>
                    <th scope="col">id_member (Added by/Last updated)</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while($table = mysqli_fetch_array($result,MYSQLI_NUM)){
                    $book = $table[0];
                    $title = $table[1];
                    $author = $table[2];
                    $published = $table[3];
                    $member = $table[4];

                    echo"<tr>";
                    echo "<td>$book</td>";
                    echo "<td>$title</td>";
                    echo "<td>$author</td>";
                    echo "<td>$published</td>";
                    echo "<td>$member</td>";
                    echo "<td><form method='POST' action='update.php'><button name='update'type='submit' value='$book'>Update</button></form></td>";
                    echo "<td><form method='POST' action='delete.php'><button name='delete'type='submit' onclick='return myconfirmed()' value='$book'>Delete</button></form></td>";
                    echo"</tr>";
        
                }
                
                ?>
            </tbody>

        </table>

    </div>
</body>
</html>