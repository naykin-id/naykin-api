<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/payment_method.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$payment_method = new PaymentMethod($connection);

$data = json_decode(file_get_contents("php://input"));

$payment_method->id = $data->id;
$payment_method->name = $data->name;
$payment_method->description = $data->description;
$payment_method->modifiedBy = $data->modifiedBy;

if($payment_method->update()){
    echo '{';
        echo '"message": "PaymentMethod was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update payment_method."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>