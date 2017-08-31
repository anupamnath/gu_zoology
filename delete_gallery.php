<?php

$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$id=$_POST['id'];


$sql="select name from gallery where id='$id'";

if ($result=mysqli_query($conn, $sql))
{
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
   
       unlink("img/".$name);

       if(mysqli_query($conn, "delete from gallery where id='$id'"))
       {
       	echo "Deleted";
       }


}


?>