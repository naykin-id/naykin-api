<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/passenger.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$passenger = new Passenger($connection);

$data = json_decode(file_get_contents("php://input"));

$passenger->fullName = $data->fullName;
$passenger->age = $data->age;
$passenger->identity = $data->identity;
$passenger->identityType = $data->identityType;
$passenger->createdBy = $data->createdBy;

if($passenger->create()){
    echo '{';
        echo '"message": "Passenger was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create passenger."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>