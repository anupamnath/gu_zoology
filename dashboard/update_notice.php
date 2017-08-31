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
$subject=$_POST['subject'];
//$sql="INSERT into notice (subject,link) values('$subject','$link')";
$sql="update notice set subject='$subject' where id='$id'";

if (mysqli_query($conn, $sql)) {
    echo "Successfully Updated";    
}

?>


