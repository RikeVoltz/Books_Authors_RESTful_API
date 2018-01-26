<?php
header("Content-Type: text/html; charset=UTF-8");
$author=new Author();
$result=$author->delete();
echo $result['isInTable'];
if ($result['isDeleted'])
    header("Status: 200 Ok");
elseif ($result['isInTable']) {
    header("Status: 409 Conflict");
    echo "<h1>409 Conflct. Author has books.</h1>";
} else {
    header("Status: 404 Not Found");
    echo "<h1>404 Author not found</h1>";    
}
unset($author);
?>