<?php



$dbHost = "localhost";
$dbDatabase = "gu";
$dbPass = "";
$dbUser = "root";
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbDatabase);


$file_name = $_FILES['galleryUpload']['name'];

$sql="INSERT into gallery (name) values('$file_name')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";
    $errors= array();
    $file_name = $_FILES['galleryUpload']['name'];
    //echo $file_name;
    $file_size =$_FILES['galleryUpload']['size'];
    $file_tmp =$_FILES['galleryUpload']['tmp_name'];
    $file_type=$_FILES['galleryUpload']['type'];
    $file_explode=explode('.',$file_name);
    $file_ext=end($file_explode);

    $expensions= array("jpg","jpeg","png",'PNG');

    if(in_array($file_ext,$expensions)=== false){
        $errors[]="extension not allowed, please choose jpg, jpeg or png";
    }

    if($file_size > 2097152){
        $errors[]='File size must be less than 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"img/".$file_name);
        echo "Success file uploaded";
    }else{
        print_r($errors);
    }





} 




else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>


