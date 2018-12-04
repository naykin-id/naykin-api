<?php
class Seat{
// Connection instance
private $connection;
// table name
private $table_name = "Seat";
// table columns
public $id;
public $seatType;
public $columns;
public $baris;
public $capacity;
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
    $query = "INSERT INTO ". $this->table_name ." (SeatType, Columns, Baris, Capacity, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->seatType."', '".$this->columns."', '".$this->baris."', '".$this->capacity."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.SeatType, a.Columns, a.Baris, a.Capacity, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET SeatType = '".$this->seatType."', Columns = '".$this->columns."', Baris= '".$this->baris."', Capacity = '".$this->capacity."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";

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