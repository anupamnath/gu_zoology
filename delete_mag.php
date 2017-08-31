<?php

$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$id=$_POST['id'];


$sql="select thumbnail,filename from magazine where id='$id'";

if ($result=mysqli_query($conn, $sql))
{
    $row=mysqli_fetch_array($result);
    $thumbnail=$row['thumbnail'];
    $file=$row['filename'];
       unlink("upload/".$file);
       unlink("uploadImage/".$thumbnail);
       if(mysqli_query($conn, "delete from magazine where id='$id'"))
       {
       	echo "Deleted";
       }


}


?>