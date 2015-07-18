<?php
	$id=$_POST['id'];
	$name=$_POST['name'];
	$path="pictures/".$name;
	$size=$_POST['size'];
	$size1=ceil($size/1024);
	$des=$_POST['des'];
	
	echo '<img src ="'.$path.'" width="400" height="300"></br>';
	echo 'Please enter the description:</br>';
	echo '<form action="edit2.php" method="post" name="edit" id="edit">';
	echo '<input type = "hidden" method="post" name="id" id="id" value="'.$id.'">';
	echo '<input type = "hidden" method="post" name="name" id="name" value="'.$name.'">';
	echo '<textarea cols="25" rows="7" id="des" name="des"></textarea>';
	echo '</br>';
	echo '<input type="submit" name="submit" value="submit">';
	echo '</form>';
	echo '</div>';
	echo '<ul>';
	echo '<li>Picture Name:'.$name.'</li>';
	echo '</br>';
	echo '<li>Picture Size:'.$size1.'KB</li>';
	echo '</br>';
	echo '<li>Picture Description:'.$des.'</li>';
	echo '</br>';
	echo '</ul>';
?>


