<?php
class Sponsor {
    private $SponsorID;
    private $Name;
    private $Address;    
    private $ManagerFName;
    private $ManagerLName;
    private $ManagerEmail;
    private $PhoneNumber;
    
    public function __construct($id, $name, $address, $manFName, $manLName, $manEmail, $phoneNumber) {
        $this->SponsorID = $id;
        $this->Name = $name;
        $this->Address = $address;
        $this->ManagerFName = $manFName;
        $this->ManagerLName = $manLName;
        $this->ManagerEmail = $manEmail;
        $this->PhoneNumber = $phoneNumber;
    }
    
    public function getSponsorID() { return $this->SponsorID; }
    public function getName() { return $this->Name; }
    public function getAddress() { return $this->Address; }
    public function getMFName() { return $this->ManagerFName; }
    public function getMLName() { return $this->ManagerLName; }
    public function getMEmail() { return $this->ManagerEmail; }
    public function getPhoneNumber() { return $this->PhoneNumber; }
}
?>

