<?php
header("Content-Type: text/html; charset=UTF-8");
$author=new Author();
$result=$author->put();
if ($result)
    header("Status: 200 Ok");
else {
    header("Status: 404 Not Found");
    require_once $_SERVER['DOCUMENT_ROOT']."/errors/404.html";         
}
unset($author);
?>