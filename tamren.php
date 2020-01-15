
<html>
<body>

<?php
 
 function change(string $statement)
   {
       $number = strlen($statement);
	  // echo $number;
	   
 
	    for( $i=$number-1; $i>=0 ; $i--)
       {
		   	  
		   echo $statement[$i];
            
		   
       }
   }
   if (isset($_POST) &&!empty($_POST['number'])){
	   
		change($_POST['number']);
   }
?> 	
 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
 <input name="number">
 <input type="submit">
 
 </form>
</body>
</html>
