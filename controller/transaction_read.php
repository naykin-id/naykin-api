<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/transaction.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$transaction = new Transaction($connection); 

$stmt = $transaction->read();
$count = $stmt->rowCount();

if($count > 0){


    $transactions = array();
    $transactions["body"] = array();
    $transactions["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDSchedule" => $row['IDSchedule'],
              "IDPromotion" => $row['IDPromotion'],
              "IDCustomer" => $row['IDCustomer'],
              "TransactionCode" => $row['TransactionCode'],
              "BookingDate" => $row['BookingDate'],
              "IDPaymentMethod" => $row['IDPaymentMethod'],
              "TotalPrice" => $row['TotalPrice'],
              "PaymentStatus" => $row['PaymentStatus'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($transactions["body"], $p);
    }

    echo json_encode($transactions);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>