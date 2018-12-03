<?php

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/dbclass.php';

include_once '../services/officer_position.php';

try{
$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$officer_position = new OfficerPosition($connection);

$data = json_decode(file_get_contents("php://input"));

$officer_position->id = $data->id;
$officer_position->positionName = $data->positionName;
$officer_position->description = $data->description;
$officer_position->modifiedBy = $data->modifiedBy;

if($officer_position->update()){
    echo '{';
        echo '"message": "OfficerPosition was updated."';
    echo '}';
}
else{
    echo '{';
        echo '"message": "Unable to update officer_position."';
    echo '}';
}
}
catch(Exception $e)
{
    echo $e;
}
?>