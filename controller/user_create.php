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

$user->username = $data->username;
$user->passwordSalt = $data->passwordSalt;
$user->passwordHash = $data->passwordHash;
$user->firstName = $data->firstName;
$user->lastName = $data->lastName;
$user->email = $data->email;
$user->isLocked = $data->isLocked;
$user->createdBy = $data->createdBy;

if($user->create()){
    echo '{';
        echo '"message": "User was created."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to create user."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>