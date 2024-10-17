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
        <form action="search.php" method="post">
            
            <input type="search" name = "search_rec" placeholder="search from DB" > <input type="submit" name="searchAll" value="display all records"> <input type="submit" name ="searchBy" value ="searchBy">
        </form>
        <?php

        if(isset($_POST['searchAll'])){
            $selectsql = "SELECT * FROM id_databasetbl";
            $result = mysqli_query($conn, $selectsql);
            if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'>
                    <tr>
                        <th>Id_number</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Phonenumber</th>
                        
                    </tr>";
                    while ($row = mysqli_fetch_assoc($result)){
                        
                        echo "<tr>";
                        echo '<td>'.$row['id_number'].'</td>';
                        echo '<td>'.$row['firstname'].'</td>';
                        echo '<td>'.$row['lastname'].'</td>';
                        echo '<td>'.$row['phonenumber'].'</td>';
                        "</tr>";
                }
            }
        }
        elseif(isset($_POST['searchBy'])){
            $search_rec = $_POST['search_rec'];
            $selectsql = "SELECT * FROM id_databasetbl
            WHERE `id_number`='$search_rec' or `firstname` = '$search_rec' or `lastname` = '$search_rec' or `phonenumber` = '$search_rec'";
            $result = mysqli_query($conn, $selectsql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>
                <tr>
                    <th>Id_number</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Phone_number</th>
                </tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    
                    echo "<tr>";
                    echo '<td>'.$row['id_number'].'</td>';
                    echo '<td>'.$row['firstname'].'</td>';
                    echo '<td>'.$row['lastname'].'</td>';
                    echo '<td>'.$row['phonenumber'].'</td>';
                    "</tr>";
            }
        }
        else{
            echo "no record found";
        }

        }
        ?>
</body>
</html>