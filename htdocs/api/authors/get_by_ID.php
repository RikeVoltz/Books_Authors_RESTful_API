<?php
header("Charset=UTF-8");
$author=new Author();
$author->get_by_ID();
if ($author->id){
	header("Status: 200 Ok");
	echo json_encode($author,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
}
else
{
	header("Status: 404 Not Found");
	echo "<h1>404 Author not found</h1>";	
}
unset($author);
?>