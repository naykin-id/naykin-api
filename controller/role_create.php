<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/role.php';
try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$role = new Role($connection);

$data = json_decode(file_get_contents("php://input"));

$role->roleName = $data->roleName;
$role->description = $data->description;
$role->createdBy = $data->createdBy;

if($role->create()){
    echo '{';
        echo '"message": "Role was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create role."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>