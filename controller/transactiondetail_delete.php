<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/transaction_detail.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$transaction_detail = new TransactionDetail($connection);

$data = json_decode(file_get_contents("php://input"));

$transaction_detail->id = $data->id;

if($transaction_detail->delete()){
    echo '{';
        echo '"message": "TransactionDetail was updated status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update status transaction_detail."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>