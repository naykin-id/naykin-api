<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/agent.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$agent = new Agent($connection); 

$stmt = $agent->read();
$count = $stmt->rowCount();

if($count > 0){


    $agents = array();
    $agents["body"] = array();
    $agents["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDManager" => $row['IDManager'],
              "AgentName" => $row['AgentName'],
              "Phone" => $row['Phone'],
              "Email" => $row['Email'],
              "Address" => $row['Address'],
              "Longtitude" => $row['Longtitude'],
              "Latitude" => $row['Latitude'],
              "TotalVehicle" => $row['TotalVehicle'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($agents["body"], $p);
    }

    echo json_encode($agents);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>