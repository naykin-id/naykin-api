<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/transaction.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$transaction = new Transaction($connection);

$data = json_decode(file_get_contents("php://input"));

$transaction->idSchedule = $data->idSchedule;
$transaction->idPromotion = $data->idPromotion;
$transaction->idCustomer = $data->idCustomer;
$transaction->transactionCode = $data->transactionCode;
$transaction->bookingDate = $data->bookingDate;
$transaction->idPaymentMethod = $data->idPaymentMethod;
$transaction->totalPrice = $data->totalPrice;
$transaction->paymentStatus = $data->paymentStatus;
$transaction->createdBy = $data->createdBy;

if($transaction->create()){
    echo '{';
        echo '"message": "Transaction was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create transaction."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>