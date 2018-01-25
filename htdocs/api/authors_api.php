<?php
require('objects/author.php');
switch(getenv("REQUEST_METHOD")){
	case "GET":
		if (isset($_GET['id']))
			require('authors/get_by_ID.php');
		else
			require('authors/get.php');
		break;
	case "POST":
		require('authors/post.php');
		break;
	case "PUT":
		require('authors/put.php');
		break;
	case "DELETE":
		require('authors/delete.php');
		break;
}
?>