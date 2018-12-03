<?php
class Agent{
    // Connection instance
    private $connection;
    // table name
    private $table_name = "Agent";
    // table columns
    public $id;
    public $idManager;
    public $agentName;
    public $phone;
    public $email;
    public $address;
    public $longtitude;
    public $latitude;
    public $totalVehicle;
    public $rowStatus;
    public $createdDate;
    public $createdBy;
    public $modifiedDate;
    public $modifiedBy;
	// public $now = new DateTime();
    public function __construct($connection){
    $this->connection = $connection;
    date_default_timezone_set('Asia/Jakarta'); 
    }
    //C
    public function create(){
        $query = "INSERT INTO ". $this->table_name ." (IDManager, AgentName, Phone, Email, Address, Longtitude, Latitude, TotalVehicle, RowStatus, CreatedDate, CreatedBy) VALUES ('".$this->idManager."', '".$this->agentName."', '".$this->phone."', '".$this->email."', '".$this->address."', '".$this->longtitude."', '".$this->latitude."', ".$this->totalVehicle.", 0, '".date("Y-m-d H:i:s")."', '".$this->createdBy."')";

        $stmt = $this->connection->prepare($query);
		
        $stmt->execute();

        return $stmt;
    }
    //R
    public function read(){
        $query = "SELECT a.ID, a.IDManager, a.AgentName, a.Phone, a.Email, a.Address, a.Longtitude, a.Latitude, a.TotalVehicle, a.RowStatus, a.CreatedDate, a.CreatedBy, a.ModifiedDate, a.ModifiedBy FROM ".$this->table_name." a WHERE a.RowStatus = '0'";

        //PDO
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        //biasa
        // $result = $conn->query($query);

        return $stmt;
    }
    //U
    public function update(){
        $query = "UPDATE ". $this->table_name ." SET IDManager = ".$this->idManager.", AgentName = ".$this->agentName.", Phone = ".$this->phone.", Email = ".$this->email.", Address = ".$this->address.", Longtitude = ".$this->longtitude.", Latitude = ".$this->latitude.", TotalVehicle = ".$this->totalVehicle.", ModifiedDate = ".date("Y-m-d H:i:s").", ModifiedBy = ".$this->modifiedBy." WHERE ID = ".$this->id;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //D
    public function delete(){
        $query = "UPDATE ". $this->table_name ." SET RowStatus = '-1' WHERE ID = ".$id;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }    
}