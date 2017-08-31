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

$mag_name=$_POST['name'];
$description=$_POST['description'];
$date=$_POST['date'];
$file_name = $_FILES['Emagazine']['name'];
$file_tmp =$_FILES['Emagazine']['tmp_name'];
$file_name_thumb=$_FILES['magazineThumbnail']['name'];


/*$im = new imagick('$file_name[0]');
$im->setImageFormat('jpg');
header('Content-Type: image/jpeg');
echo $im;*/









$sql="INSERT into magazine (filename,thumbnail,name) values('".$mag_name.$file_name."','".$mag_name.$file_name_thumb."','$mag_name')";

if (mysqli_query($conn, $sql)) {
    echo "new record created successfully";
    $errors= array();
    $file_name = $_FILES['Emagazine']['name'];
    //echo $file_name;
    $file_size =$_FILES['Emagazine']['size'];
    $file_tmp =$_FILES['Emagazine']['tmp_name'];
    $file_type=$_FILES['Emagazine']['type'];
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
        move_uploaded_file($file_tmp,"upload/".$mag_name.$file_name);
        echo "Success file uploaded";
    }else{
        print_r($errors);
    }

/****************thumbnail***********************/
    $file_name_thumb = $_FILES['magazineThumbnail']['name'];
    //echo $file_name;
    $file_size_thumb =$_FILES['magazineThumbnail']['size'];
    $file_tmp_thumb =$_FILES['magazineThumbnail']['tmp_name'];
    $file_type_thumb=$_FILES['magazineThumbnail']['type'];
    $file_explode_thumb=explode('.',$file_name_thumb);
    $file_ext_thumb=end($file_explode_thumb);

    $extensions= array("jpg","jpeg","png");

    if(in_array($file_ext_thumb,$extensions)=== false){
        $errors[]="extension not allowed, please choose jpg,jpeg or png";
    }

    if($file_size > 2097152){
        $errors[]='File size must be excately 2 MB';
    }

    if(empty($errors)==true){
        move_uploaded_file($file_tmp_thumb,"uploadImage/".$mag_name.$file_name_thumb);
        echo "Success file uploaded";
    }else{
        print_r($errors);
    }
/****************thumbnail***********************/



} 




else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}






?>


