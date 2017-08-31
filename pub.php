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


$name=$_POST['name'];
//$year=$_POST['year'];
$link=$_POST['link'];
$contributor=$_POST['contributor'];
//$number=$_POST['number'];











$sql="INSERT into publication (name,link,contributor) values('$name','$link','$contributor')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>


