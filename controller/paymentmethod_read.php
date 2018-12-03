<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/payment_method.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$payment_method = new PaymentMethod($connection); 

$stmt = $payment_method->read();
$count = $stmt->rowCount();

if($count > 0){


    $payment_methods = array();
    $payment_methods["body"] = array();
    $payment_methods["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "Name" => $row['Name'],
              "Description" => $row['Description'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($payment_methods["body"], $p);
    }

    echo json_encode($payment_methods);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>