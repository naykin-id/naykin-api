<?php
class Seat{
// Connection instance
private $connection;
// table name
private $table_name = "seat";
// table columns
public $id;
public $seatType;
public $columns;
public $rows;
public $capacity;
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