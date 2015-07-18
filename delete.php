<?php
$id=$_POST['id'];
$name=$_POST['name'];
$path="pictures/".$name;


$conn = mysqli_connect("mysql.dur.ac.uk","vtlh48","hagg23is","Cvtlh48_gallery");
$query = "DELETE FROM pictures WHERE id = $id";
$result=mysqli_query($conn,$query);
$del=unlink($path);

if($result==ture &&$del==ture)
{echo "<script language='javascript'>alert('Deleted!');location='index1.php';</script>";}
else
{echo "<script language='javascript'>alert('Delete failed!');location='index1.php';</script>";}


