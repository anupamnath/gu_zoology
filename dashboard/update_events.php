<?php


$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);

$id=$_POST['id'];
$name=$_POST['name'];
$date=$_POST['date'];
$description=$_POST['description'];
//$sql="INSERT into notice (subject,link) values('$subject','$link')";
$sql="update event set name='$name', date='$date', description='$description' where id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Successfully Updated";    
}

?>


