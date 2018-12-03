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

$officer->id = $data->id;

if($officer->delete()){
    echo '{';
        echo '"message": "Officer was updated status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update status officer."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>