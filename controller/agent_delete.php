<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/agent.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$agent = new Agent($connection);

$data = json_decode(file_get_contents("php://input"));

$agent->id = $data->id;

if($agent->delete()){
    echo '{';
        echo '"message": "Product was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update product."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>