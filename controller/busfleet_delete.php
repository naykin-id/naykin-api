<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/bus_fleet.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$bus_fleet = new BusFleet($connection);

$data = json_decode(file_get_contents("php://input"));

$bus_fleet->id = $data->id;

if($bus_fleet->delete()){
    echo '{';
        echo '"message": "BusFleet was updated status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update status bus_fleet."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>