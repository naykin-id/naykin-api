<?php
class Route{
// Connection instance
private $connection;
// table name
private $table_name = "Route";
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
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
date_default_timezone_set('Asia/Jakarta');
}
//C
public function create(){
    $query = "INSERT INTO ". $this->table_name ." (RouteCode, IDAgentFrom, IDAgentTo, Cost, FuelCost, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->routeCode."', '".$this->idAgentFrom."', '".$this->idAgentTo."', '".$this->cost."', '".$this->fuelCost."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.RouteCode, a.IDAgentFrom, a.IDAgentTo, a.Cost, a.FuelCost, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET RouteCode = '".$this->routeCode."', IDAgentFrom = '".$this->idAgentFrom."', IDAgentTo = '".$this->idAgentTo."', Cost = '".$this->cost."', FuelCost = '".$this->fuelCost."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";
        
    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}
//D
public function delete(){
    $query = "UPDATE ". $this->table_name ." SET RowStatus = '-1' WHERE ID = '".$this->id."'";

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}    
}