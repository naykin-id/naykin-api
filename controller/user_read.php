<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/user.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$user = new User($connection); 

$stmt = $user->read();
$count = $stmt->rowCount();

if($count > 0){


    $users = array();
    $users["body"] = array();
    $users["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "Username" => $row['Username'],
              "PasswordSalt" => $row['PasswordSalt'],
              "PasswordHash" => $row['PasswordHash'],
              "FirstName" => $row['FirstName'],
              "LastName" => $row['LastName'],
              "Email" => $row['Email'],
              "IsLocked" => $row['IsLocked'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($users["body"], $p);
    }

    echo json_encode($users);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>