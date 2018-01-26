<?php
header("Charset=UTF-8");
$book=new Book();
$book->getByISBN();
if ($book) { 
    header("Status: 200 Ok");
    header("Content-Type: application/json");
    echo json_encode($book,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
} else {
    header("Status: 404 Not Found");
    header("Content-Type: text/html");
    echo "<h1>404 Book not found</h1>";    
}
unset($book);
?>