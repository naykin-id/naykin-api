<?php
class Schedule{
// Connection instance
private $connection;
// table name
private $table_name = "Schedule";
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
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
date_default_timezone_set('Asia/Jakarta'); 
}
//C
public function create(){
    $query = "INSERT INTO ". $this->table_name ." (IDBus, IDRoute, IDDriver, IDCoDriver, IDExtraOfficer, TotalCost, Departure, Arrival, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->idBus."', '".$this->idRoute."', '".$this->idDriver."', '".$this->idCoDriver."', '".$this->idExtraOfficer."', '".$this->totalCost."', '".$this->departure."', '".$this->arrival."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.IDBus, a.IDRoute, a.IDDriver, a.IDCoDriver, a.IDExtraOfficer, a.TotalCost, a.Departure, a.Arrival, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET IDBus = '".$this->idBus."', IDRoute = '".$this->idRoute."', IDDriver = '".$this->idDriver."', IDCoDriver = '".$this->idCoDriver."', IDExtraOfficer = '".$this->idExtraOfficer."', TotalCost = '".$this->totalCost."', Departure = '".$this->departure."', Arrival = '".$this->arrival."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";

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