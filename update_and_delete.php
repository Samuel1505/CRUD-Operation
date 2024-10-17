<?php
include 'dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
    <header>
        <a href="./index.php">Add records</a>
        <a href="./search.php">search records</a>
        <a href="./update_and_delete.php">Update/Delete Records</a>
       
    </header>
    <p></p>
        <form action="update_and_delete.php" method="post">
            
            <input type="search" name = "search_rec" placeholder="find record in the database" > 
            <input type="submit" name="searchAll" value="display all records"> 
            <input type="submit" name ="searchBy" value ="searchBy">
        </form>
        <?php

        if(isset($_POST['searchAll'])){
            $selectsql = "SELECT * FROM id_databasetbl";
            $result = mysqli_query($conn, $selectsql);
            if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>FirstName</th>
                        <th>Lastname</th>
                        <th>Phonenumber</th>
                        
                        <th colspan=2>Action</th>
                    </tr>";
                    while ($row = mysqli_fetch_assoc($result)){
                        
                        echo "<tr>";
                        echo '<td>'.$row['id_number'].'</td>';
                        echo '<td>'.$row['firstname'].'</td>';
                        echo '<td>'.$row['lastname'].'</td>';
                        echo '<td>'.$row['phonenumber'].'</td>';
                        echo '<td><button><a href="update.php?editId='.$row['id'].'">Edit</a></button></td>';
                        echo '<td><button><a href="update_and_delete.php?deleteId='.$row['id'].'">Delete</a></button></td>';
                     
                        "</tr>";
                }
            }
        }
        elseif(isset($_POST['searchBy'])){
            $search_rec = $_POST['search_rec'];
            $selectsql = "SELECT * FROM id_databasetbl 
            WHERE `id_number`= $search_rec or `firstname`='$search_rec' or `lastname` = '$search_rec' or `phonenumber` = '$search_rec'";
            $result = mysqli_query($conn, $selectsql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                <tr>
                    <th>IDNumber</th>
                    <th>FirstName</th>
                    <th>lastname</th>
                    <th>phonenumber</th>
                    <th colspan=2>Action</th>
                </tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    
                    echo "<tr>";
                    echo '<td>'.$row['id_number'].'</td>';
                    echo '<td>'.$row['firstname'].'</td>';
                    echo '<td>'.$row['lastname'].'</td>';
                    echo '<td>'.$row['phonenumber'].'</td>';
                    echo '<td><button><a href="update.php?editId='.$row['id'].'">Edit</a></button></td>';
                    echo '<td><button><a href="update_and_delete.php?deleteId='.$row['id'].'">Delete</a></button></td>';
                    "</tr>";
            }
        }
        else{
            echo "no record found";
        }

        }

        if(isset($_GET['deleteId'])) {
            $deleteId = $_GET['deleteId'];
            $sql = "DELETE FROM `id_databasetbl` WHERE `id`='$deleteId'";
            $runQuery  = mysqli_query($conn, $sql);
            if($runQuery == true){
                echo "record for ".$deleteId." deleted successfuly";
                header("Location:./index.php");
            }
        }

        ?>
</body>
</html>