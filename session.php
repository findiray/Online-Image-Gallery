<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("mysql.dur.ac.uk","vtlh48","hagg23is","Cvtlh48_gallery");
// Selecting Database
$db = mysql_select_db("Cvtlh48_gallery", $connection);
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select username from login where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
?>