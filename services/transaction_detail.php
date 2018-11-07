<?php
class TransactionDetail{
// Connection instance
private $connection;
// table name
private $table_name = "transaction_detail";
// table columns
public $id;
public $idTransaction;
public $idPassenger;
public $seatNo;
public $rowStatus;
public $createdDate;
public $createdBy;
public $modifiedDate;
public $modifiedBy;
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