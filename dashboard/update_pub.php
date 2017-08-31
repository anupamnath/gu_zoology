<?php
/**
 * Created by dhrubajyoti.
 * User: dhrubajyoti
 * Date: 20-07-2017
 * Time: 13:39
 */


$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);

$id=$_POST['id'];
$name=$_POST['name'];
$contributor=$_POST['contributor'];
$link=$_POST['link'];
//$sql="INSERT into notice (subject,link) values('$subject','$link')";
$sql="update publication set name='$name', contributor='$contributor', link='$link' where id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Successfully Updated";    
}

?>


