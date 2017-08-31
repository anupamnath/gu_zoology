<?php


$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);

$id=$_POST['id'];
$facilities=$_POST['facilities'];

//$sql="INSERT into notice (subject,link) values('$subject','$link')";
$sql="update facilities set facilities='$facilities' where id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Successfully Updated";    
}

?>


