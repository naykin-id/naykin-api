<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/bus_fleet.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$bus_fleet = new BusFleet($connection); 

$stmt = $bus_fleet->read();
$count = $stmt->rowCount();

if($count > 0){


    $bus_fleets = array();
    $bus_fleets["body"] = array();
    $bus_fleets["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDManager" => $row['IDManager'],
              "FleetName" => $row['FleetName'],
              "Phone" => $row['Phone'],
              "Email" => $row['Email'],
              "Address" => $row['Address'],
              "TotalVehicle" => $row['TotalVehicle'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($bus_fleets["body"], $p);
    }

    echo json_encode($bus_fleets);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>