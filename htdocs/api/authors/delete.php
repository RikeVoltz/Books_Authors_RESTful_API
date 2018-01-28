<?php
header("Content-Type: text/html; charset=UTF-8");
$author=new Author();
$result=$author->delete();
echo $result['isInTable'];
if ($result['isDeleted'])
    header("Status: 200 Ok");
elseif ($result['isInTable']) {
    header("Status: 409 Conflict");
    require_once $_SERVER['DOCUMENT_ROOT']."/errors/409.html";     
} else {
    header("Status: 404 Not Found");
    require_once $_SERVER['DOCUMENT_ROOT']."/errors/404.html";         
}
unset($author);
?>