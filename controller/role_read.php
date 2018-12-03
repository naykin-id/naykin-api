<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/role.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$role = new Role($connection); 

$stmt = $role->read();
$count = $stmt->rowCount();

if($count > 0){


    $roles = array();
    $roles["body"] = array();
    $roles["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "Name" => $row['Name'],
              "Description" => $row['Description'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($roles["body"], $p);
    }

    echo json_encode($roles);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>