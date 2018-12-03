<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/bus.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$bus = new Bus($connection); 

$stmt = $bus->read();
$count = $stmt->rowCount();

if($count > 0){


    $buss = array();
    $buss["body"] = array();
    $buss["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDBusFleet" => $row['IDBusFleet'],
              "IDAgent" => $row['IDAgent'],
              "IDSeat" => $row['IDSeat'],
              "PoliceNo" => $row['PoliceNo'],
              "EngineNo" => $row['EngineNo'],
              "BusType" => $row['BusType'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($buss["body"], $p);
    }

    echo json_encode($buss);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>