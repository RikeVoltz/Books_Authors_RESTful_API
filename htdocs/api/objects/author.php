<?php
header("Content-Type: application/json;");
class Author{
	private $connection;
	private $table_name="authors";
	
	public $id;
	public $name;
	public $surname;
	public $midname;
	public function __construct(){
		$this->connection=new mysqli('localhost', 'root', 'password','books_database');
		$this->connection->set_charset("utf8");
		if ($this->connection->connect_errno)
			die("Connection to database failed");
	}

	function get(){
		$result=$this->connection->query("SELECT * FROM $this->table_name");
		return $result;
	}

	function get_by_ID(){
		$this->id=$this->connection->real_escape_string($_GET['id']);
		$query=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
		$book=$query->fetch_assoc();
		$this->name=$book['name'];
		$this->surname=$book['surname'];
		$this->midname=$book['midname'];
		$this->id=$book['id'];
	}

	function put(){
		$this->id=$this->connection->real_escape_string($_GET['id']);
		$new_author=json_decode(file_get_contents("php://input"));
		$this->name=$this->connection->real_escape_string($new_author->name);
		$this->surname=$this->connection->real_escape_string($new_author->surname);
		$this->midname=$this->connection->real_escape_string($new_author->midname);
		$previous_author=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
		if (!$this->name)
			$this->name=$previous_author->name;
		if (!$this->surname)
			$this->surname=$previous_author->surname;
		if (!$this->midname)
			$this->midname=$previous_author->midname;
		$result=$this->connection->query("UPDATE $this->table_name SET name='$this->name',surname='$this->surname', midname='$this->midname' WHERE id=$this->id");
		return $result;
	}

	function post(){
		$new_author=json_decode(file_get_contents("php://input"));
		$this->name = $this->connection->real_escape_string($new_author->name);
		$this->surname = $this->connection->real_escape_string($new_author->surname);
		$this->midname = $this->connection->real_escape_string($new_author->midname);
		$result=$this->connection->query("INSERT INTO $this->table_name (name,surname,midname) VALUES ('$this->name','$this->surname','$this->midname')"); 		
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