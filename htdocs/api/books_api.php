<?php
require('objects/book.php');
switch(getenv("REQUEST_METHOD")){
	case "GET":
		if (isset($_GET['id'])){
			require('books/get_by_ID.php');
		}
		elseif (isset($_GET['ISBN'])){
			require('books/get_by_ISBN.php');
		}
		elseif (isset($_GET['author_id'])){
			require('books/get_by_author.php');
		}
		else{
			require('books/get.php');
		}
		break;
	case "POST":
		require('books/post.php');
		break;
	case "PUT":
		require('books/put.php');
		break;
	case "DELETE":
		require('books/delete.php');
		break;
}
?>