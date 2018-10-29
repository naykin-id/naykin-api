<?php
class Passenger{
// Connection instance
private $connection;
// table name
private $table_name = "passenger";
// table columns
public $id;
public $fullName;
public $age;
public $identity;
public $identityType;
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