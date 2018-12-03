<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/route.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$route = new Route($connection); 

$stmt = $route->read();
$count = $stmt->rowCount();

if($count > 0){


    $routes = array();
    $routes["body"] = array();
    $routes["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "RouteCode" => $row['RouteCode'],
              "IDAgentFrom" => $row['IDAgentFrom'],
              "IDAgentTo" => $row['IDAgentTo'],
              "Cost" => $row['Cost'],
              "FuelCost" => $row['FuelCost'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($routes["body"], $p);
    }

    echo json_encode($routes);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>