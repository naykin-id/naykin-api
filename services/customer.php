<?php
class Customer{
// Connection instance
private $connection;
// table name
private $table_name = "customer";
// table columns
public $id;
public $fullName;
public $gender;
public $age;
public $phone;
public $email;
public $address;
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