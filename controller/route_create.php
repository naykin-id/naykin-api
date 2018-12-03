<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/route.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$route = new Route($connection);

$data = json_decode(file_get_contents("php://input"));

$route->routeCode = $data->routeCode;
$route->idAgentFrom = $data->idAgentFrom;
$route->idAgentTo = $data->idAgentTo;
$route->cost = $data->cost;
$route->fuelCost = $data->fuelCost;
$route->createdBy = $data->createdBy;

if($route->create()){
    echo '{';
        echo '"message": "Route was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create route."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>