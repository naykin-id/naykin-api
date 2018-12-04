<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/transaction_detail.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$transaction_detail = new TransactionDetail($connection); 

$stmt = $transaction_detail->read();
$count = $stmt->rowCount();

if($count > 0){


    $transaction_details = array();
    $transaction_details["body"] = array();
    $transaction_details["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDTransaction" => $row['IDTransaction'],
              "IDPassenger" => $row['IDPassenger'],
              "SeatNo" => $row['SeatNo'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($transaction_details["body"], $p);
    }

    echo json_encode($transaction_details);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>