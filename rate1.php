<?php
ob_start();
?>
<html>
<body>
</body>
<?php
require "Blogic.php";
session_start();
?>

<script language="javascript" type="text/javascript">
        
        click4=0;click1=0;click2=0;click3=0;click5=0;count=0;
     

    function mouseClick1()
    {
        
        if((click1%2)==0)
        {
            document.getElementById("1").src = "ye.jpg";
            click1++;
            count++;
           
            
        }
        else
        {
            document.getElementById("1").src = "wh.jpg";
            click1++;
            count--;
           
        }       
       
    }  
    
       
    
     
         function mouseClick2()
    {
        
        if((click2%2)==0)
        {
            document.getElementById("2").src = "ye.jpg";
            click2++;
            count++;
            
        }
        else
        {
            document.getElementById("2").src = "wh.jpg";
            click2++;
            count--;
           
        }       
       
    }  
    
       
        function mouseClick3()
    {
        
        if((click3%2)==0)
        {
            document.getElementById("3").src = "ye.jpg";
            click3++;
            count++;
            
        }
        else
        {
            document.getElementById("3").src = "wh.jpg";
            click3++;
           count--;
        }       
       
    }  
    
       
        function mouseClick4()
    {
        
        if((click4%2)==0)
        {
            document.getElementById("4").src = "ye.jpg";
            click4++;
            count++;
            
        }
        else
        {
            document.getElementById("4").src = "wh.jpg";
            click4++;
           count--;
        }       
       
    }  
    
       
        function mouseClick5()
    {
        
        if((click5%2)==0)
        {
            document.getElementById("5").src = "ye.jpg";
            click5++;
            count++;
            
        }
        else
        {
            document.getElementById("5").src = "wh.jpg";
            click5++;
          count--;
        }       
       
    }  
    
            function mouseClick6()
    {
    
    window.location="rate2.php?c="+count;

    } 
  </script>  
   
 
<body>
<div >
<table>
<form>
<tr>
<td><img id="1" src="wh.jpg" onclick="mouseClick1()" height="30" width="30"/></td>
<td><img id="2" src="wh.jpg" onclick="mouseClick2()" height="30" width="30"/></td>
<td><img id="3" src="wh.jpg" onclick="mouseClick3()" height="30" width="30"/></td>
<td><img id="4" src="wh.jpg" onclick="mouseClick4()" height="30" width="30"/></td>
<td><img id="5" src="wh.jpg" onclick="mouseClick5()" height="30" width="30"/></td>
</tr>
<tr><td colspan="5" align="center"><input id="submitbutton1" type="button" value="RATE" onclick="mouseClick6()"/></td>
</tr>
</form>
</table>
</div>
</body>
