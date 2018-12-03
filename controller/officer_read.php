<?php

header("Content-Type: application/json; charset=UTF-8");

include_once '../config/dbclass.php';
include_once '../services/officer.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$officer = new Officer($connection); 

$stmt = $officer->read();
$count = $stmt->rowCount();

if($count > 0){


    $officers = array();
    $officers["body"] = array();
    $officers["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        extract($row);
        $p  = array(
              "ID" => $row['ID'],
              "IDPosition" => $row['IDPosition'],
              "FullName" => $row['FullName'],
              "KTP" => $row['KTP'],
              "NPWP" => $row['NPWP'],
              "Gender" => $row['Gender'],
              "Age" => $row['Age'],
              "Phone" => $row['Phone'],
              "Email" => $row['Email'],
              "Address" => $row['Address'],
              "RowStatus" => $row['RowStatus'],
              "CreatedDate" => $row['CreatedDate'], 
              "CreatedBy" => $row['CreatedBy'],
              "ModifiedDate" => $row['ModifiedDate'],
              "ModifiedBy" => $row['ModifiedBy']
        );

        array_push($officers["body"], $p);
    }

    echo json_encode($officers);
}

else {
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}

?>