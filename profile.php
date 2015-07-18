<?php
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="profile">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
</br>
<a href="index1.php">Back to the homepage</a>
</br>
<b id="logout"><a href="logout1.php">Log Out</a></b>
</div>
</body>
</html>