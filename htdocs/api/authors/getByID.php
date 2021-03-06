<?php
header("Charset=UTF-8");
$author=new Author();
$author->getByID();
if ($author->id) {
    header("Status: 200 Ok");
    header("Content-Type: application/json");
    echo json_encode($author,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
} else {
    header("Status: 404 Not Found");
    header("Content-Type: text/html");
    require_once $_SERVER['DOCUMENT_ROOT']."/errors/404.html";    
}
unset($author);
?>