<?php
class DBClass {
private $host = "sql174.main-hosting.eu";
private $username = "u859746278_naykn";
private $password = "naykin";
private $database = "u859746278_naykn";
public $connection;
// get the database connection
public function getConnection(){
$this->connection = null;
try{
$this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
$this->connection->exec("set names utf8");
}catch(PDOException $exception){
echo "Error: " . $exception->getMessage();
}
return $this->connection;
}
}
?>