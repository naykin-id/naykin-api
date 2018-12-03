<?php
class Officer{
// Connection instance
private $connection;
// table name
private $table_name = "Officer";
// table columns
public $id;
public $idPosition;
public $fullName;
public $ktp;
public $npwp;
public $gender;
public $age;
public $phone;
public $email;
public $address;
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
    $query = "INSERT INTO ". $this->table_name ." (IDPosition, FullName, KTP, NPWP, Gender, Age, Phone, Email, Address, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->idPosition."', '".$this->fullName."', '".$this->ktp."', '".$this->npwp."', '".$this->gender."', ".$this->age.", '".$this->phone."', '".$this->email."', '".$this->address."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.IDPosition, a.FullName, a.KTP, a.NPWP, a.Gender, a.Age, a.Phone, a.Email, a.Address, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET IDPosition = '".$this->idPosition."', FullName = '".$this->fullName."', KTP = '".$this->ktp."', NPWP = '".$this->npwp."', Gender = '".$this->gender."', Age = '".$this->age."', Phone = '".$this->phone."', Email = '".$this->email."', Address = '".$this->address."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";
        
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