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
$user->username = $data->username;
$user->passwordSalt = $data->passwordSalt;
$user->passwordHash = $data->passwordHash;
$user->firstName = $data->firstName;
$user->lastName = $data->lastName;
$user->email = $data->email;
$user->isLocked = $data->isLocked;
$user->modifiedBy = $data->modifiedBy;

if($user->update()){
    echo '{';
        echo '"message": "User was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update user."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>