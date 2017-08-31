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

$subject=$_POST['subject'];
//$description=$_POST['description'];
//$link=$_POST['link'];
$scholar=$_POST['scholar'];











$sql="INSERT into research (subject,scholar) values('$subject','$scholar')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>


