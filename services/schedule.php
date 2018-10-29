<?php
class Schedule{
// Connection instance
private $connection;
// table name
private $table_name = "schedule";
// table columns
public $id;
public $idBus;
public $idRoute;
public $idDriver;
public $idCoDriver;
public $idExtraOfficer;
public $totalCost;
public $departure;
public $arrival;
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