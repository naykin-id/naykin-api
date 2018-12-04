<?php
class Transaction{
// Connection instance
private $connection;
// table name
private $table_name = "Transaction";
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
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
date_default_timezone_set('Asia/Jakarta'); 
}
//C
public function create(){
    $query = "INSERT INTO ". $this->table_name ." (IDSchedule, IDPromotion, IDCustomer, TransactionCode, BookingDate, IDPaymentMethod, TotalPrice, PaymentStatus, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->idSchedule."', '".$this->idPromotion."', '".$this->idCustomer."', '".$this->transactionCode."', '".$this->bookingDate."', '".$this->idPaymentMethod."', '".$this->totalPrice."', '".$this->paymentStatus."', 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";
    
    $stmt = $this->connection->prepare($query);
    
    $stmt->execute();

    return $stmt;
}
//R
public function read(){
    $query = "SELECT a.ID, a.IDSchedule, a.IDPromotion, a.IDCustomer, a.TransactionCode, a.BookingDate, a.IDPaymentMethod, a.TotalPrice, a.PaymentStatus, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

    //PDO
    $stmt = $this->connection->prepare($query);
    $stmt->execute();

    //biasa
    // $result = $conn->query($query);

    return $stmt;
}
//U
public function update(){
    $query = "UPDATE ". $this->table_name ." SET IDSchedule = '".$this->idSchedule."', IDPromotion = '".$this->idPromotion."', IDCustomer = '".$this->idCustomer."', TransactionCode = '".$this->transactionCode."', BookingDate = '".$this->bookingDate."', IDPaymentMethod = '".$this->idPaymentMethod."', TotalPrice = '".$this->totalPrice."', PaymentStatus = '".$this->paymentStatus."', ModifiedDate = '".date("Y-m-d H:i:s")."', ModifiedBy = '".$this->modifiedBy."' WHERE ID = '".$this->id."'";

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