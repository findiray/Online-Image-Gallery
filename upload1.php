<?php
$target_dir = "pictures/";
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$imageName = $_FILES["picture"]["name"];
$imagePath = "http://community.dur.ac.uk/yang.lei2/".$target_dir.$imageName;
$imageSize = $_FILES["picture"]["size"] ;
$thumbname = "thumb_".$imageName;
$thumbpath = "http://community.dur.ac.uk/yang.lei2/pictures/thumbs/".$thumbname;
$servername = "mysql.dur.ac.uk";
$username = "vtlh48";
$password = "hagg23is";
$databasename="Cvtlh48_gallery";



// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
        
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        
        $uploadOk = 0;
    }
}
//Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";

  $uploadOk = 0;
}
// Check file size
if ($_FILES["picture"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
 
    $uploadOk = 0;

}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Your file was not uploaded.";
    echo '</br>';
     echo '<a href=index1.php>Back to the homepage</a>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"] , $target_file)) {
        $conn = mysqli_connect("$servername","$username","$password","$databasename");
        $query_upload = "INSERT INTO pictures (size,picname,picpath) VALUES ('$imageSize','$imageName','$imagePath')";
        mysqli_query($conn,$query_upload) or die ("error in $query_upload == -->".mysqli_error($conn));

     echo "<script language='javascript'>alert('Uploaded!');location='index1.php';</script>";
    } else {
        //echo "Sorry, there was an error uploading your file.";
        "<script language='javascript'>alert('Sorry, there was an error uploading your file.');location='index1.php';</script>";
    }
}


?>
