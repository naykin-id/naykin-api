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
        print_r(array_values($row));
        $p  = array(
              "ID" => $id,
              "IDManager" => $idManager,
              "AgentName" => $agentName,
              "Phone" => $phone,
              "Email" => $email,
              "Address" => $address,
              "Longtitude" => $longtitude,
              "Latitude" => $latitude,
              "TotalVehicle" => $totalVehicle,
              "RowStatus" => $rowStatus,
              "CreatedDate" => $createdDate, 
              "CreatedBy" => $createdBy,
              "ModifiedDate" => $modifiedDate,
              "ModifiedBy" => $modifiedBy
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