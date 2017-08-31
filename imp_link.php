<?php



$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$name=$_POST['name'];
$link=$_POST['link'];

$sql="INSERT into link (name,address) values('$name','$link')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>


