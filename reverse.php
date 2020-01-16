<html>
<body>

<?php
    function reversDigits($num)  
    {  
        $num = intval($num);
        $rev_num = 0; 
        while($num > 1) { 
          $rev_num = $rev_num * 10 + $num % 10; 
          $num = (int)$num / 10; 
        } 
            return $rev_num; 
        } 
       
   if (isset($_POST) &&!empty($_POST['number'])){
      
    echo "<h2>Reverse of number is: ".reversDigits($_POST['number']."</h2>"); 
   }
?> 	
 
 <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
 <input name="number" type="number">
 <input type="submit">
 
 </form>
</body>
</html>
