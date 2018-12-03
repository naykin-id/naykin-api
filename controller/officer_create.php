<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/officer.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$officer = new Officer($connection);

$data = json_decode(file_get_contents("php://input"));

$officer->idPosition = $data->idPosition;
$officer->fullName = $data->fullName;
$officer->ktp = $data->ktp;
$officer->npwp = $data->npwp;
$officer->gender = $data->gender;
$officer->age = $data->age;
$officer->phone = $data->phone;
$officer->email = $data->email;
$officer->address = $data->address;
$officer->createdBy = $data->createdBy;

if($officer->create()){
    echo '{';
        echo '"message": "Officer was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create officer."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>