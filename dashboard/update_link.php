<?php


$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);

$id=$_POST['id'];
$name=$_POST['name'];
$address=$_POST['address'];
//$sql="INSERT into notice (subject,link) values('$subject','$link')";
$sql="update link set name='$name', address='$address' where id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Successfully Updated";    
}

?>


