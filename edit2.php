<?php
$id=$_POST['id'];
$name=$_POST['name'];
$path="pictures/".$name;
$des=$_POST['des'];


$conn = mysqli_connect("mysql.dur.ac.uk","vtlh48","hagg23is","Cvtlh48_gallery");
$query = "UPDATE pictures SET bewrite='$des' WHERE id = $id";
$result=mysqli_query($conn,$query);

if($result==true)
{echo "<script language='javascript'>alert('Updated!');location='index1.php';</script>";}
else
{echo "<script language='javascript'>alert('Failed!');location='index1.php';</script>";}


?>