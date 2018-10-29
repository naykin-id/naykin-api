<?php
class Route{
// Connection instance
private $connection;
// table name
private $table_name = "route";
// table columns
public $id;
public $routeCode;
public $idAgentFrom;
public $idAgentTo;
public $cost;
public $fuelCost;
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