<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/schedule.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$schedule = new Schedule($connection); 

$stmt = $schedule->read();
$count = $stmt->rowCount();

if($count > 0){


    $schedules = array();
    $schedules["body"] = array();
    $schedules["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDBus" => $row['IDBus'],
              "IDRoute" => $row['IDRoute'],
              "IDDriver" => $row['IDDriver'],
              "IDCoDriver" => $row['IDCoDriver'],
              "IDExtraOfficer" => $row['IDExtraOfficer'],
              "TotalCost" => $row['TotalCost'],
              "Departure" => $row['Departure'],
              "Arrival" => $row['Arrival'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($schedules["body"], $p);
    }

    echo json_encode($schedules);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>