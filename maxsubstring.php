<html>
<body>

<?php
 
	   function lengthOfLongestSubstring($str) {
		$result = 0;
		$hash = [];
		for ($i = $j = 0, $l = strlen($str); $j < $l; $j++) {
			
			if (isset($hash[$str[$j]])) {
				// echo $hash[$str[$j]];
				// var_dump($hash);
				$i = max($i, $hash[$str[$j]] + 1);
			}
			$result = max($result, $j - $i + 1);
			$hash[$str[$j]] = $j;
		}
		return [$result, $hash];
	}
	
	function key_implode(&$array) {
		$result = "";
		foreach ($array as $key => $value) {
			$result .= $key;
		}
		return $result;
	}

	function maxsubstring($str) {
		echo "<h3>the string is :" . $str."</h3>";
		list($len, $hash) = lengthOfLongestSubstring($str);
		echo "<h3>longest string is :" . key_implode($hash)."</h3>";		
		echo "<h3>longest string length is :" . $len."</h3>";
		
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
