<?php
class PaymentMethod{
// Connection instance
private $connection;
// table name
private $table_name = "payment_method";
// table columns
public $id;
public $name;
public $description;
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