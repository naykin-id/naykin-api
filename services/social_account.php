<?php
class SocialAccount{
// Connection instance
private $connection;
// table name
private $table_name = "social_account";
// table columns
public $id; 
public $idUser;
public $providerName;
public $providerId;
public $rowStatus;
public $createdDate;
public $createdBy;
public $modifiedDate;
public $modifiedBy;
public function __construct($connection){
$this->connection = $connection;
}
//C
public function create(){}
//R
public function read(){}
//U
public function update(){}
//D
public function delete(){}    
}