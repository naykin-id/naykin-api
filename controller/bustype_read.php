<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/bus_type.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$bus_type = new BusType($connection); 

$stmt = $bus_type->read();
$count = $stmt->rowCount();

if($count > 0){


    $bus_types = array();
    $bus_types["body"] = array();
    $bus_types["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "Type" => $row['Type'],
              "Capacity" => $row['Capacity'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($bus_types["body"], $p);
    }

    echo json_encode($bus_types);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>