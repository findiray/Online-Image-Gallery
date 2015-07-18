<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Image Gallery</title>
<link href='http://fonts.googleapis.com/css?family=Petit+Formal+Script|Headland+One|Orienta' rel='stylesheet' type='text/css'>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script>
	 // DOM ready
	 $(function() {
	   
      // Create the dropdown base
      $("<select />").appendTo("nav");
      
      // Create default option "Go to..."
      $("<option />", {
         "selected": "selected",
         "value"   : "",
         "text"    : "Select a page"
      }).appendTo("nav select");
      
      // Populate dropdown with menu items
      $("nav a").each(function() {
       var el = $(this);
       $("<option />", {
           "value"   : el.attr("href"),
           "text"    : el.text()
       }).appendTo("nav select");
      });
      
	   // To make dropdown actually work
      $("nav select").change(function() {
        window.location = $(this).find("option:selected").val();
      });
	 
	 });
	</script>
</head>
<body>
  <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '401915056627645',
      xfbml      : true,
      version    : 'v2.2'
    });

    // ADD ADDITIONAL FACEBOOK CODE HERE
    function onLogin(response) {
  if (response.status == 'connected') {
    FB.api('/me?fields=first_name', function(data) {
      var welcomeBlock = document.getElementById('fb-welcome');
      welcomeBlock.innerHTML = 'Hello, ' + data.first_name + '!';
    });
  }
}

FB.getLoginStatus(function(response) {
  // Check login status on load, and if the user is
  // already logged in, go directly to the welcome message.
  if (response.status == 'connected') {
    onLogin(response);
  } else {
    // Otherwise, show Login dialog first.
    FB.login(function(response) {
      onLogin(response);
    }, {scope: 'user_friends, email'});
  }
});
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<header>
    <h1><a href="">Image Gallery</a></h1>
    <h1 id="fb-welcome" ></h1>
</header>
<div class="wrapperContainer">
    <nav>
        <ul>
            <li class><a href="upload.php">Upload</a></li>
            <li class><a href="login1.php">Login</a></li>
            <li class><a href="">About</a></li>
        </ul>
    </nav>
    <div class="wrapper">
        <div class="contentBody">
           <?php

  $conn = mysqli_connect("mysql.dur.ac.uk","vtlh48","hagg23is","Cvtlh48_gallery");
  $query = "SELECT * FROM pictures";
  $result=mysqli_query($conn,$query);

  while($row=mysqli_fetch_array($result))
  {
    $id=$row['id'];
    $name=$row['picname'];
    $size=$row['size'];
    $des=$row['bewrite'];
    echo '<div>';
    echo '<a href="'.$row['picpath'].'">';
    echo '<img src = "'.$row['picpath'].'">';
    echo '</a>';
    echo '</div>';
    echo '<p>';
    echo '<form action="delete.php" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="id" id="id" value="'.$id.'">';
    echo '<input type="hidden" name="name" id="name" value="'.$name.'">';
    echo '<input type="submit" value="delete" name="delete">';
    echo '</form>';
    echo '<form action="edit.php" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="id" id="id" value="'.$id.'">';
    echo '<input type="hidden" name="name" id="name" value="'.$name.'">';
    echo '<input type="hidden" name="size" id="size" value="'.$size.'">';
    echo '<input type="hidden" name="des" id="des" value="'.$des.'">';
    echo '<input type="submit" value="edit" name ="edit"> ';
    echo '</form>';
    echo '</p>';
  }
 
?>         
        </div>
       
        <div class="clearfloat"></div>
    </div>
        
       
    <footer>
        <p class="copyright">
            Copyright &copy; <a href="#">Image Gallery</a> <p>Designed by Yang Lei | 2014 DURHAM UNIVERSITY</p>
        </p>
    </footer>
</div>
</body>
</html>
