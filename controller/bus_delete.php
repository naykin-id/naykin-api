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

if($bus->delete()){
    echo '{';
        echo '"message": "Bus was updated status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update status bus."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>