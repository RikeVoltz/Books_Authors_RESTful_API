<?php
header("Charset=UTF-8");
$book=new Book();
$book->get_by_ISBN();
if ($book){
	header("Content-Type: application/json");	
	header("Status: 200 Ok");
	echo json_encode($book);
}
else
{
	header("Content-Type: text/html");
	header("Status: 404 Not Found");
	echo "<h1>404 Book not found</h1>";	
}
unset($book);
?>