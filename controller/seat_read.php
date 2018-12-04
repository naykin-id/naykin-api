<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/seat.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$seat = new Seat($connection); 

$stmt = $seat->read();
$count = $stmt->rowCount();

if($count > 0){


    $seats = array();
    $seats["body"] = array();
    $seats["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "SeatType" => $row['SeatType'],
              "Columns" => $row['Columns'],
              "Baris" => $row['Baris'],
              "Capacity" => $row['Capacity'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($seats["body"], $p);
    }

    echo json_encode($seats);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>