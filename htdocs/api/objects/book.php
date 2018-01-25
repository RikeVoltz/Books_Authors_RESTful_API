<?php
class Book{
	private $connection;
	private $table_name="books";
	
	public $id;
	public $author_id;
	public $ISBN;
	public $title;
	public $year;	
	public function __construct(){	
		$this->connection=new mysqli('localhost', 'root', 'password','books_database');
		$this->connection->set_charset("utf8");
		if ($this->connection->connect_errno)
			die("Connection to database failed");
	}
	
	function get_by_ID(){
		$this->id=$this->connection->real_escape_string($_GET['id']);
		$query=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
		$book=$query->fetch_assoc();
		$this->ISBN=$book['ISBN'];
		$this->author_id=$book['author_id'];
		$this->title=$book['title'];
		$this->year=$book['year'];
		$this->id=$book['id'];
	}
	
	function get(){
		$result=$this->connection->query("SELECT * FROM $this->table_name");
		return $result;
	}

	function get_by_ISBN(){
		$this->ISBN=$this->connection->real_escape_string($_GET['ISBN']);
		$query=$this->connection->query("SELECT * FROM $this->table_name WHERE ISBN='$this->ISBN'");
		$book=$query->fetch_assoc();
		$this->id=$book['id'];
		$this->author_id=$book['author_id'];
		$this->title=$book['title'];
		$this->year=$book['year'];
	}
	
	function get_by_author(){
		$this->author_id=$this->connection->real_escape_string($_GET['author_id']);
		$result=$this->connection->query("SELECT * FROM $this->table_name WHERE author_id=$this->author_id");
		return $result;
	}
	
	function put(){
		$this->id=$this->connection->real_escape_string($_GET['id']);
		$new_book=json_decode(file_get_contents("php://input"));
		$this->author_id=$this->connection->real_escape_string($new_book->author_id);
		$this->ISBN=$this->connection->real_escape_string($new_book->ISBN);
		$this->title=$this->connection->real_escape_string($new_book->title);
		$this->year=$this->connection->real_escape_string($new_book->year);
		$previous_book=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
		if (!$this->author_id)
			$this->author_id=$previous_book->author_id;
		if (!$this->ISBN)
			$this->ISBN=$previous_book->ISBN;
		if (!$this->title)
			$this->title=$previous_book->title;
		if (!$this->year)
			$this->year=$previous_book->year;
		$result=$this->connection->query("UPDATE $this->table_name SET author_id=$this->author_id,ISBN='$this->ISBN', title='$this->title', year='$this->year' WHERE id=$this->id");
		return $result;
	}
	
	function post(){
		$new_book=json_decode(file_get_contents("php://input"));
		$this->title = $this->connection->real_escape_string($new_book->title);
		$this->year = $this->connection->real_escape_string($new_book->year);
		$this->ISBN = $this->connection->real_escape_string($new_book->ISBN);
		$this->author_id = $this->connection->real_escape_string($new_book->author_id);
		$result=$this->connection->query("INSERT INTO $this->table_name (title,year,ISBN,author_id) VALUES ('$this->title',$this->year,'$this->ISBN',$this->author_id)");		
		return $result;
	}

	function delete(){
		$this->id=$this->connection->real_escape_string($_GET['id']);
		$result=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
		if ($result)
			$result=$this->connection->query("DELETE FROM $this->table_name WHERE id=$this->id");
		return $result;
	}
}
?>