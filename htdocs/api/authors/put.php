<?php
header("charset=UTF-8");
$author=new Author();
$result=$author->put();
if ($result)
	header("Status: 200 Ok");
else{
	header("Status: 404 Not Found");
	echo "<h1>404 Author not found</h1>";	
}
unset($author);
?>