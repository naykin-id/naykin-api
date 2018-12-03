<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/promotion.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$promotion = new Promotion($connection); 

$stmt = $promotion->read();
$count = $stmt->rowCount();

if($count > 0){


    $promotions = array();
    $promotions["body"] = array();
    $promotions["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "StartDate" => $row['StartDate'],
              "EndDate" => $row['EndDate'],
              "PromotionType" => $row['PromotionType'],
              "Value" => $row['Value'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($promotions["body"], $p);
    }

    echo json_encode($promotions);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>