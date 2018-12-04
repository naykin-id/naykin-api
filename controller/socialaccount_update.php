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
$social_account->idUser = $data->idUser;
$social_account->providerName = $data->providerName;
$social_account->providerId = $data->providerId;
$social_account->modifiedBy = $data->modifiedBy;

if($social_account->update()){
    echo '{';
        echo '"message": "SocialAccount was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update social_account."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>