<?php
$conn = mysqli_connect('localhost', 'root', '', 'id_database');
if (!$conn){
    die("Connection failed:" .mysqli_error());
} 