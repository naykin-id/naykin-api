<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/bus_type.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$bus_type = new BusType($connection);

$data = json_decode(file_get_contents("php://input"));

$bus_type->type = $data->type;
$bus_type->capacity = $data->capacity;
$bus_type->createdBy = $data->createdBy;

if($bus_type->create()){
    echo '{';
        echo '"message": "BusType was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create bus_type."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>