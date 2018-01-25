<?php
header("charset=UTF-8");
$book=new Book();
$result=$book->post();
if ($result)
	header("Status: 200 Ok");
else{
	header("Status: 409 Conflict");
	echo "<h1>409 Conflict. This book already exists</h1>";	
}
unset($book);
?>