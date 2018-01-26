<?php    
header("Charset=UTF-8");
$book=new Book();
$result=$book->get();
if ($result) {
    header("Status: 200 Ok");
    header("Content-Type: application/json");
    while ($book=$result->fetch_assoc())
        $json[]=$book;
    echo json_encode($json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
} else {
    header("Status: 404 Not Found");
    header("Content-Type: text/html");
    echo "<h1>404 Data not found</h1>";    
}
unset($book);
?>