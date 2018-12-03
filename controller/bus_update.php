<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/bus.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$bus = new Bus($connection);

$data = json_decode(file_get_contents("php://input"));

$bus->id = $data->id;
$bus->idBusFleet = $data->idBusFleet;
$bus->idAgent = $data->idAgent;
$bus->idSeat = $data->idSeat;
$bus->policeNo = $data->policeNo;
$bus->engineNo = $data->engineNo;
$bus->busType = $data->busType;
$bus->modifiedBy = $data->modifiedBy;

if($bus->update()){
    echo '{';
        echo '"message": "Bus was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update bus."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>