<?php
header("charset=UTF-8");
$author=new Author();
$result=$author->post();
if ($result)
	header("Status: 200 Ok");
else{
	header("Status: 409 Conflict");
	echo "<h1>409 Conflict. This author already exists</h1>";	
}
unset($author);
?>