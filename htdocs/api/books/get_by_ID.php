<?php
header("Charset=UTF-8");
$book=new Book();
$book->get_by_ID();
if ($book->id){
	header("Status: 200 Ok");
	echo json_encode($book,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
}
else
{
	header("Status: 404 Not Found");
	echo "<h1>404 Book not found</h1>";	
}
unset($book);
?>