<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/social_account.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$social_account = new SocialAccount($connection); 

$stmt = $social_account->read();
$count = $stmt->rowCount();

if($count > 0){


    $social_accounts = array();
    $social_accounts["body"] = array();
    $social_accounts["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDUser" => $row['IDUser'],
              "ProviderName" => $row['ProviderName'],
              "ProviderID" => $row['ProviderID'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($social_accounts["body"], $p);
    }

    echo json_encode($social_accounts);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>