<?php
require "Blogic.php";
session_start();
?>
<body background="ab.jpg">
<table  height="100%" width="100%">
<tr height="25%"> <td colspan="4" align="right" ><a href="employee3.php"><img src="home.png" height="80" width="80"/></a></td> </tr>


<tr height="20%"> <td width="25%"></td> <td width="18%"></td> 
<td width="29%">
	<form method="post" action="t2.php">
		<input class="input" type="text" name="norobot" />
		
		<input type="submit" value="Submit" />
		<br/><br/>
		<img src="gen_captcha.php" />
	</form>

<td width="33%"></td></tr>


<tr height="30%" >  <td colspan="4"></td>



</tr>


<tr height="25%" > <td colspan="4"></td> 
</tr>
</body>