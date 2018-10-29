<?php
class Transaction{
// Connection instance
private $connection;
// table name
private $table_name = "transaction";
// table columns
public $id;
public $idSchedule;
public $idPromotion;
public $idCustomer;
public $transactionCode;
public $bookingDate;
public $idPaymentMethod;
public $totalPrice;
public $paymentStatus;
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