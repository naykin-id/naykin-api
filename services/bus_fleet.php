<?php
class BusFleet{
// Connection instance
private $connection;
// table name
private $table_name = "bus_fleet";
// table columns
public $id;
public $idManager;
public $fleetName;
public $phone;
public $email;
public $address;
public $totalVehicle;
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