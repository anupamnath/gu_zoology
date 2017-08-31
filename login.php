<?php

$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$email=$_POST['email'];
$pwd=$_POST['pwd'];


$sql="select * from admin where email='$email' && pwd='$pwd'";

if ($rows=mysqli_query($conn, $sql)) {
    if(mysqli_num_rows($rows)>0){
        session_start();
    	$_SESSION['email']=$email;
        echo "true";    	
    }
    else
    {
    	
    	echo "false";
    }

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>