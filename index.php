<?php
include 'dbconnection.php';

if (isset($_POST['add'])) {
    $id_number = $_POST['id_number'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['phonenumber'];
    $query = "INSERT INTO `id_databasetbl` ( `id_number`, `firstname`, `lastname`, `phonenumber`) 
    VALUES ('$id_number', '$firstname', '$lastname', '$phonenumber')";
    $result = mysqli_query($conn, $query);

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <table border="1" align="center" width="80%">
        <tr height="5">
            <td colspan="4" align="center" >

                <p style="font-size: 50px;"> <b>IDENTITY DATABSE</b>
                </p>
        </tr>
        <tr height="80">
            <td align="center" bgcolor="">
                <a href="./">
                    ADD RECORDS
                </a>
            </td>
            <td align="center" bgcolor="">
                <a href="./search.php">
                    SEARCH RECORDS
                </a>
            </td>
            <td align="center" bgcolor="">
                <a href="./delete.php">
                    DELETE RECORDS
                </a>
            </td>
            <td align="center" bgcolor="">
                <a href="./update.php">
                    EDIT RECORDS
                </a>

            </td>
        </tr>     
        <tr height="300">
            <td colspan="2" style="padding: 40px;">
                <form action="index.php" method="post">
                <table >
                    <tr>
                        <td width="100" align="center">
                            <input type="text" name="id_number" placeholder="Enter your id_number" required>
                            <p></p>
                            <input type="text" name="firstname" placeholder="Enter your firstname" required>
                            <p></p>
                            <input type="text" name="lastname" placeholder="Enter your lastname" required>
                            <p></p>
                            <input type="text" name="phonenumber" placeholder="Enter your phonenumber" required>
                            <p></p>
                            <input type="submit" name="add" value="Add">
                        </td>
                    </tr>
                </table>
                </form>
            </td>
            <table border="1" width="500">
                <tr bgcolor="" colspan="2" style="padding: 40px;" >
                    <td align="center">id_number</td>
                    <td align="center">First Name</td>
                    <td  align="center">Last Name</td>
                    <td align="center">Phone Number</td>
                
                    <?php
                        $select="select*from id_databasetbl";
                        $result = mysqli_query($conn, $select);

                    
                        if (mysqli_num_rows($result) > 0 )
                            {
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                    echo "<tr>";
                                    echo "<td>".$row['id_number']. "</td>";
                                    echo "<td>".$row['firstname']. "</td>";
                                    echo "<td>".$row['lastname']. "</td>";
                                    echo "<td>".$row['phonenumber']. "</td>";
                                    echo "</tr>";
                                }
                            }   
                    ?> 
                </tr>
            </table>
                    </tr>
        </td>
        </tr>
       