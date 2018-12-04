<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/social_account.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$social_account = new SocialAccount($connection);

$data = json_decode(file_get_contents("php://input"));

$social_account->id = $data->id;

if($social_account->delete()){
    echo '{';
        echo '"message": "SocialAccount was updated status."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update status social_account."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>