<?php
class Officer{
// Connection instance
private $connection;
// table name
private $table_name = "officer";
// table columns
public $id;
public $idPosition;
public $fullName;
public $ktp;
public $npwp;
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