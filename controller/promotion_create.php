<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/promotion.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$promotion = new Promotion($connection);

$data = json_decode(file_get_contents("php://input"));

$promotion->startDate = $data->startDate;
$promotion->endDate = $data->endDate;
$promotion->promotionType = $data->promotionType;
$promotion->value = $data->value;
$promotion->createdBy = $data->createdBy;

if($promotion->create()){
    echo '{';
        echo '"message": "Promotion was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create promotion."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>