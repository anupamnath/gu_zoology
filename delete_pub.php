<?php

$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$id=$_POST['id'];

$sql="delete from publication where id='$id'";


if (mysqli_query($conn, $sql)) {
    echo "deleted successfully";    
}
?>