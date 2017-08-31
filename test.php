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
$email=$_POST['email'];
$comment=$_POST['comment'];











$sql="INSERT into comment (name,email,comment) values('$name','$email','$comment')";

if (mysqli_query($conn, $sql)) {
    echo "Thankyou";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>


