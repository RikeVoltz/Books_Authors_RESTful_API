<?php
class Author{
    private $connection;
    private $table_name="authors";
    
    public $id;
    public $name;
    public $surname;
    public $midname;
    
    public function __construct()
    {
        $this->connection=new mysqli('localhost', 'root', 'password','books_database');
        $this->connection->set_charset("utf8");
        if ($this->connection->connect_errno)
            die("Connection to database failed");
    }

    public function get()
    {
        $query=$this->connection->query("SELECT * FROM $this->table_name");
        return $query;
    }

    public function getByID()
    {
        $this->id=$this->connection->real_escape_string($_GET['id']);
        $query=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
        $book=$query->fetch_assoc();
        $this->name=$book['name'];
        $this->surname=$book['surname'];
        $this->midname=$book['midname'];
        $this->id=$book['id'];
    }

    public function put()
    {
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
        $query=$this->connection->query("UPDATE $this->table_name SET name='$this->name',surname='$this->surname', midname='$this->midname' WHERE id=$this->id");
        return $query;
    }

    public function post()
    {
        $this->connection->query("ALTER TABLE $this->table_name auto_increment=0"); 
        $new_author=json_decode(file_get_contents("php://input"));
        $this->name = $this->connection->real_escape_string($new_author->name);
        $this->surname = $this->connection->real_escape_string($new_author->surname);
        $this->midname = $this->connection->real_escape_string($new_author->midname);
        $query=$this->connection->query("INSERT INTO $this->table_name (name,surname,midname) VALUES ('$this->name','$this->surname','$this->midname')");         
        return $query;
    }

    public function delete()
    {
        $this->id=$this->connection->real_escape_string($_GET['id']);
        $query=$this->connection->query("SELECT * FROM $this->table_name WHERE id=$this->id");
        $result['isInTable']=false;
        $result['isDeleted']=false;
        if ($query->num_rows) {
            $result['isInTable']=true;
            $query=$this->connection->query("DELETE FROM $this->table_name WHERE id=$this->id");
            if ($this->connection->affected_rows)
                $result['isDeleted']=true;
        }
        return $result;
    }
}
?>
