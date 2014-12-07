<?php
ob_start();
	session_start();
	if (md5($_POST['norobot']) == $_SESSION['key'])	{ 
		// here you  place code to be executed if the captcha test passes
			header("location:mbrprofile.php");
	}	else {  
		// here you  place code to be executed if the captcha test fails
			echo "you're a very naughty robot!";
	}
	ob_flush();
?>
<html>
<body>
<a href="home.php"><img src="home.png" width="100" height="100"/></a>
</body>
</html>