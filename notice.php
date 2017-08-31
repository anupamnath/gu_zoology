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
$file_name = $_FILES['noticePdf']['name'];
$sql="INSERT into notice (subject,link) values('$subject','$file_name')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";    
    $errors= array();
    $file_name = $_FILES['noticePdf']['name'];
    //echo $file_name;
    $file_size =$_FILES['noticePdf']['size'];
    $file_tmp =$_FILES['noticePdf']['tmp_name'];
    $file_type=$_FILES['noticePdf']['type'];
    $file_explode=explode('.',$file_name);
    $file_ext=end($file_explode);

    $expensions= array("pdf");

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose PDF";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
        echo "Success file uploaded";
    }else{
        print_r($errors);
    }
}

?>


