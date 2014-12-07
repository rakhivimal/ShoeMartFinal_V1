<?php
require "Blogic.php";
session_start();
?>
<body></body>

<?php
ob_start();

$a=$_SESSION['id'];
?>
<a href="home.php"><img src="home.png" width="100" height="100"/></a>
<a href="cpswd.php"><img src="m1.png" width="100" height="100"/></a><br />
<a href="mbrlogout.php"><img src="m2.png" width="100" height="100"/></a>
</body>
</html>



