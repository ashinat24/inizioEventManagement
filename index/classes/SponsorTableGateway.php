<?php
require_once 'Sponsor.php';

class SponsorTableGateway {

    private $connect;
    
    public function __construct($c) {
        $this->connect = $c;
    }
    
    public function getSponsors() {
        $sqlQuery = "SELECT * FROM sponsors";
        
        $statement = $this->connect->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve sponsor details");
        }
        
        return $statement;
    }
    
    public function getSponsorById($id) {
        $sqlQuery = "SELECT * FROM sponsors WHERE SponsorID = :id";
        
        $statement = $this->connect->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve sponsor ID");
        }
        
        return $statement;
    }

    public function getSponsorByName($name) {
        $sqlQuery = "SELECT * FROM sponsors WHERE Name LIKE :name";
        
        $statement = $this->connect->prepare($sqlQuery);
        $params = array(
            "name" => "%" . $name . "%" // Use LIKE operator for partial matches
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not retrieve sponsors by name");
        }
        
        return $statement;
    }
    
    
    public function insert($p) {
        $sql = "INSERT INTO sponsors(Name, Address, ManagerFName, ManagerLName, ManagerEmail, PhoneNumber) " .
                "VALUES (:Name, :Address, :ManagerFName, :ManagerLName, :ManagerEmail, :PhoneNumber)";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "Name"              => $p->getName(),
            "Address"           => $p->getAddress(),            
            "ManagerFName"      => $p->getMFName(),
            "ManagerLName"      => $p->getMLName(),
            "ManagerEmail"      => $p->getMEmail(),
            "PhoneNumber"       => $p->getPhoneNumber()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not insert sponsor");
        }
        
        $id = $this->connect->lastInsertId();
        
        return $id;
    }
    
    public function update($p) {
        $sql = "UPDATE sponsors SET " .
                "Name = :Name, " . 
                "Address = :Address, " .                
                "ManagerFName = :ManagerFName, " .
                "ManagerLName = :ManagerLName, " .
                "ManagerEmail = :ManagerEmail, " .
                "PhoneNumber = :PhoneNumber ".
                " WHERE SponsorID = :id";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "Name"              => $p->getName(),
            "Address"           => $p->getAddress(),            
            "ManagerFName"      => $p->getMFName(),
            "ManagerLName"      => $p->getMLName(),
            "ManagerEmail"      => $p->getMEmail(),
            "PhoneNumber"       => $p->getPhoneNumber(),
            "id"                => $p->getSponsorID()
        );
        
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not update sponsor details");
        }
    }
    
    public function delete($id) {
        $sql = "DELETE FROM sponsors WHERE SponsorID = :id";
        
        $statement = $this->connect->prepare($sql);
        $params = array(
            "id" => $id
        );
        $status = $statement->execute($params);
        
        if (!$status) {
            die("Could not delete sponsor");
        }
    }    
}
?>
