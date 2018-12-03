<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/officer_position.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$officer_position = new OfficerPosition($connection); 

$stmt = $officer_position->read();
$count = $stmt->rowCount();

if($count > 0){


    $officer_positions = array();
    $officer_positions["body"] = array();
    $officer_positions["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "PositionName" => $row['PositionName'],
              "Description" => $row['Description'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($officer_positions["body"], $p);
    }

    echo json_encode($officer_positions);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>