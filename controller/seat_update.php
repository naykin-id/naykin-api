<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/seat.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$seat = new Seat($connection);

$data = json_decode(file_get_contents("php://input"));

$seat->id = $data->id;
$seat->seatType = $data->seatType;
$seat->columns = $data->columns;
$seat->baris = $data->baris;
$seat->capacity = $data->capacity;
$seat->modifiedBy = $data->modifiedBy;

if($seat->update()){
    echo '{';
        echo '"message": "Seat was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update seat."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>