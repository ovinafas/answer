<html>
<body>

<?php
 
 function maxsubstring(string $statement)
   {
	   $tmp = $statement[0];
	   $res = [];
	   
	   array_push($res, $statement[0]);

	   for( $i=1; $i<strlen($statement); $i++)
       {
		   if ($statement[$i-1] == $statement[$i]) {
			   continue;
		   } else {
			
			$tmp .= $statement[$i];
			echo $tmp."<br>";
			array_push($res, $tmp);
		   }

	   }
	   
	   var_dump($res);

	   echo max($res);
   }
   if (isset($_POST) && !empty($_POST['teststr'])){
	   
		maxsubstring($_POST['teststr']);
   }
?> 	
 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
 <input name="teststr">
 <input type="submit">
 
 </form>
</body>
</html>
