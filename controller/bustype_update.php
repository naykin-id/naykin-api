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

$bus_type->id = $data->id;
$bus_type->type = $data->type;
$bus_type->capacity = $data->capacity;
$bus_type->modifiedBy = $data->modifiedBy;

if($bus_type->update()){
    echo '{';
        echo '"message": "BusType was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update bus_type."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>