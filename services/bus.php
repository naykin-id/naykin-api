<?php
class Bus{
// Connection instance
private $connection;
// table name
private $table_name = "bus";
// table columns
public $id;
public $idBusFleet;
public $idAgent;
public $idSeat;
public $policeNo;
public $engineNo;
public $busType;
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