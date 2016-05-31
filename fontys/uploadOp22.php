<?php
  include 'tempf.html';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$target_dir = "uploadpics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "<br>File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "<br>File is not an image.<br>";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<br>Sorry, file already exists.<br>";
    $uploadOk = 0;
} 

 // Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<br>Sorry, your file is too large.<br>";
    $uploadOk = 0;
} 

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
    $uploadOk = 0;
} 

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br>Sorry, your file was not uploaded.<br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.<br>";
    } else {
        echo "<br>Sorry, there was an error uploading your file.<br>";
    }
//Display pic
if ($uploadOk = 1 ){
   $namepic ="uploadpics/" . basename( $_FILES["fileToUpload"]["name"]);

 echo "<br><img src=" . $namepic . " class='medium' alt='uploaded pic' />";   
}
    
}
 include 'tempfend.php';