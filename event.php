<?php


$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$name=$_POST['name'];
$date=$_POST['date'];
$description=$_POST['description'];

$sql="INSERT into event (name,date,description) values('$name','$date','$description')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>