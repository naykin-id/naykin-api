<?php
class Promotion{
// Connection instance
private $connection;
// table name
private $table_name = "Promotion";
// table columns
public $id;
public $startDate;
public $endDate;
public $promotionType;
public $value;
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
    $query = "INSERT INTO ". $this->table_name ." (StartDate, EndDate, PromotionType, Value, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->startDate."', '".$this->endDate."', '".$this->promotionType."', '".$this->value."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    echo $query;
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.StartDate, a.EndDate, a.PromotionType, a.Value, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET StartDate = '".$this->startDate."', EndDate = '".$this->endDate."', PromotionType = '".$this->promotionType."', Value = '".$this->value."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";
        
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