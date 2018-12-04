<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/user_roles.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$user_roles = new UserRoles($connection); 

$stmt = $user_roles->read();
$count = $stmt->rowCount();

if($count > 0){


    $user_roless = array();
    $user_roless["body"] = array();
    $user_roless["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDUser" => $row['IDUser'],
              "IDRole" => $row['IDRole'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($user_roless["body"], $p);
    }

    echo json_encode($user_roless);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>