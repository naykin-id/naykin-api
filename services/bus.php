<?php
class Bus{
// Connection instance
private $connection;
// table name
private $table_name = "Bus";
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
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
date_default_timezone_set('Asia/Jakarta'); 
}
//C
public function create(){
    $query = "INSERT INTO ". $this->table_name ." (IDBusFleet, IDAgent, IDSeat, PoliceNo, EngineNo, BusType, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->idBusFleet."', '".$this->idAgent."', '".$this->idSeat."', '".$this->policeNo."', '".$this->engineNo."', '".$this->busType."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";

    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.IDBusFleet, a.IDAgent, a.IDSeat, a.PoliceNo, a.EngineNo, a.BusType, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    date_default_timezone_set('Asia/Jakarta');
    $query = "UPDATE ". $this->table_name ." SET IDBusFleet = '".$this->idBusFleet."', IDAgent = '".$this->idAgent."', IDSeat = '".$this->idSeat."', PoliceNo = '".$this->policeNo."', EngineNo = '".$this->engineNo."', BusType = '".$this->busType."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";

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