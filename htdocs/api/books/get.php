<?php    
header("Charset=UTF-8");
$book=new Book();
$result=$book->get();
$json[]=$result->fetch_assoc();
if ($json[0]) {
    header("Status: 200 Ok");
    header("Content-Type: application/json");
    while ($book=$result->fetch_assoc())
        $json[]=$book;
    echo json_encode($json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
} else {
    header("Status: 404 Not Found");
    header("Content-Type: text/html");
    require_once $_SERVER['DOCUMENT_ROOT']."/errors/404.html";     
}
unset($book);
?>