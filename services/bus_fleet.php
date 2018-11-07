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
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
}
//C
public function create(){
    date_default_timezone_set('Asia/Jakarta'); 
    $query = "INSERT INTO ". $this->table_name ." (IDManager, FleetName, Phone, Email, Address, TotalVehicle, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->idManager."', '".$this->fleetName."', '".$this->phone."', '".$this->email."', '".$this->address."', '".$this->totalVehicle.", 0, '".date("Y-m-d")."', '".$this->createdBy."')";

    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.IDManager, a.FleetName, a.Phone, a.Email, a.Address, a.TotalVehicle, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

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
    $query = "UPDATE ". $this->table_name ." SET IDManager = ".$idManager.", FleetName = ".$fleetName.", Phone = ".$phone.", Email = ".$email.", Address = ".$address.", TotalVehicle = ".$totalVehicle.", ModifiedDate = ".new Date().", ModifiedBy = ".$modifiedBy." WHERE ID = ".$id;

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}
//D
public function delete(){
    $query = "UPDATE ". $this->table_name ." SET RowStatus = '-1' WHERE ID = ".$id;

    $stmt = $this->connection->prepare($query);

    $stmt->execute();

    return $stmt;
}   
}