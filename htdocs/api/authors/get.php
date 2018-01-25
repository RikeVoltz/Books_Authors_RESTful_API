<?php
header("Charset=UTF-8");
$author=new Author();
$result=$author->get();
if ($result){
	header("Status: 200 Ok");
	while($author=$result->fetch_assoc())
		$json[]=$author;
	echo json_encode($json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
}
else{
	header("Status: 404 Not Found");
	echo "<h1>404 Data not found</h1>";	
}
unset($author);
?>