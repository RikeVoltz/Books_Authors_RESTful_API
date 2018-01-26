<?php
header("Content-Type: text/html; charset=UTF-8");
$book=new Book();
$result=$book->delete();
if ($result)
    header("Status: 200 Ok");
else {
    header("Status: 404 Not Found");
    echo "<h1>404 Book not found</h1>";    
}
unset($book);
?>