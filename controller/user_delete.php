<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/user.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$user = new User($connection);

$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;

if($user->delete()){
    echo '{';
        echo '"message": "User was updated status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update status user."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>