<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/schedule.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$schedule = new Schedule($connection);

$data = json_decode(file_get_contents("php://input"));

$schedule->id = $data->id;
$schedule->idBus = $data->idBus;
$schedule->idRoute = $data->idRoute;
$schedule->idDriver = $data->idDriver;
$schedule->idCoDriver = $data->idCoDriver;
$schedule->idExtraOfficer = $data->idExtraOfficer;
$schedule->totalCost = $data->totalCost;
$schedule->departure = $data->departure;
$schedule->arrival = $data->arrival;
$schedule->modifiedBy = $data->modifiedBy;

if($schedule->update()){
    echo '{';
        echo '"message": "Schedule was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update schedule."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>