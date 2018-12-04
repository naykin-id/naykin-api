<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/user_roles.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$user_roles = new UserRoles($connection);

$data = json_decode(file_get_contents("php://input"));

$user_roles->idUser = $data->idUser;
$user_roles->idRole = $data->idRole;
$user_roles->createdBy = $data->createdBy;

if($user_roles->create()){
    echo '{';
        echo '"message": "UserRoles was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create user_roles."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>