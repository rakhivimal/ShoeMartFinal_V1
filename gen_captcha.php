<?php
session_start();
$token = getRandomString(10);
$a=md5($token);
$string=substr($a,0,7);
$captcha=imagecreatefromgif("./1.gif");
$black=imagecolorallocate($captcha,0,0,0);
$line=imagecolorallocate($captcha,23,239,239);
imageline($captcha,40,20,94,80,$line);
$a=imagestring($captcha,30,80,20,$string,$black);
$_SESSION['key']=md5($string);
header("Content-type:image/gif");
echo imagepng($captcha);
function getRandomString($length) 
{
	       
    $validCharacters = "abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ123456789_@";
    $validCharNumber = strlen($validCharacters);
    $result = "";
 
    for ($i = 0; $i < $length; $i++)
    {
        $index = mt_rand(0, $validCharNumber - 1);
        $result .= $validCharacters[$index];
    }
	return $result;
 }
?>
?>