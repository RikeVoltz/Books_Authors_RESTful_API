<?php
header("Content-Type: text/html; charset=UTF-8");
$author=new Author();
$result=$author->post();
if ($result)
    header("Status: 200 Ok");
else {
    header("Status: 409 Conflict");
    require_once $_SERVER['DOCUMENT_ROOT']."/errors/409.html";         
}
unset($author);
?>