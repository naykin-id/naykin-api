<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/customer.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$customer = new Customer($connection); 

$stmt = $customer->read();
$count = $stmt->rowCount();

if($count > 0){


    $customers = array();
    $customers["body"] = array();
    $customers["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "FullName" => $row['FullName'],
              "Gender" => $row['Gender'],
              "Age" => $row['Age'],
              "Phone" => $row['Phone'],
              "Email" => $row['Email'],
              "Address" => $row['Address'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($customers["body"], $p);
    }

    echo json_encode($customers);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>