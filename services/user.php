<?php
class User{
// Connection instance
private $connection;
// table name
private $table_name = "user";
// table columns
public $id;
public $username;
public $passwordSalt;
public $passwordHash;
public $firstName;
public $lastName;
public $email;
public $isLocked;
public $rowStatus;
public $createdDate;
public $createdBy;
public $updatedDate;
public $updatedBy;
public function __construct($connection){
$this->connection = $connection;
}
//C
public function create(){}
//R
public function read(){}
//U
public function update(){}
//D
public function delete(){}    
}