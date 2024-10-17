<?php
$id_number = $_GET['id_number'];
 $query = "SELECT * FROM id_databasetbl WHERE id =  $id_number";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_assoc($result);
 $fetchedid_number = $row['id_number'];
 $fetchedfirstname = $row['firstname'];
 $fetchedlastname = $row['lastname'];
 $fetchedphonenumber= $row['phonenumber'];

 if(isset($_POST['update'])){
  $updatedid_number = $_POST['updateid_number'];
  $updatedfirstname = $_POST['updatefirstname'];
  $updatedlastname= $_POST['updatelastname'];
  $updatedphonenumber = $_POST['updatephonenumber'];
 
  $updateSql =  " UPDATE id_databasetbl SET id_number='$updatedid_number',firstname='$updatedfirstname',
  lastname='$updatedlastname',phonenumber='$updatedphonenumber' WHERE id='$id_number'";
  mysqli_query($conn, $updateSql);
  header("Location:./update_and_delete.php");
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="update.php" method="post">
        <table >
            <tr>
                <td width="100" align="center">
                    <p></p>
                    <input type="text" name="updateid_number" placeholder="Enter your id_number" value = "<?php echo $fetchedid_number ?>"required>
                    <p></p>
                    <input type="text" name="updatefirstname" placeholder="Enter your firstname"value = "<?php echo $fetchedfirstname ?>" required>
                    <p></p>
                    <input type="text" name="updatelastname" placeholder="Enter your lastname" value = "<?php echo $fetchedlastname?>"required>
                    <p></p>
                    <input type="text" name="updatephonemunber" placeholder="Enter phone no" value = "<?php echo $fetchedphonenumber ?>"required>
                    <p></p>
                    <input type="submit" name="update" value="Add">
            </td>
            </tr>
        
        </table>
    </form>
</body>
</html>