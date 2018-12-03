<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/passenger.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$passenger = new Passenger($connection); 

$stmt = $passenger->read();
$count = $stmt->rowCount();

if($count > 0){


    $passengers = array();
    $passengers["body"] = array();
    $passengers["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "FullName" => $row['FullName'],
              "Age" => $row['Age'],
              "Identity" => $row['Identity'],
              "IdentityType" => $row['IdentityType'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($passengers["body"], $p);
    }

    echo json_encode($passengers);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>