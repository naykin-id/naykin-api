<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/customer.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$customer = new Customer($connection);

$data = json_decode(file_get_contents("php://input"));

$customer->fullName = $data->fullName;
$customer->gender = $data->gender;
$customer->age = $data->age;
$customer->phone = $data->phone;
$customer->email = $data->email;
$customer->address = $data->address;
$customer->createdBy = $data->createdBy;

if($customer->create()){
    echo '{';
        echo '"message": "Customer was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create customer."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>