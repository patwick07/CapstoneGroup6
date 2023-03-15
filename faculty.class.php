<?php
require_once 'database.php';
class faculty{
    private $id;
    private $id_no;
    private $name;
    private $email;
    private $contact;
    private $address;
    private $id_no_current;
    protected $dbCon;

    public function __construct($id=0,$id_no="",$name="",$email="",$contact="",$address="",$id_no_current="")
    {
        $this->id = $id;
        $this->id_no = $id_no;
        $this->name = $name;
        $this->email = $email;
        $this->contact = $contact;
        $this->address = $address;
        $this->id_no_current = $id_no_current;

        $this->dbCon = new PDO(
            DB_TYPE.
            ":host=".DB_HOST.
            ";dbname=".DB_NAME,
            DB_USER,DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }

    public function setID($id){
        $this->id = $id;
    }
    public function getID(){
        return $this->id;
    }
    public function setIdNo($id_no){
        $this->id_no = $id_no;
    }
    public function getIdNo(){
        return $this->id_no;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setContact($contact){
        $this->contact = $contact;
    }
    public function getContact(){
        return $this->contact;
    }
    public function setAddress($address){
        $this->address = $address;
    }
    public function getAddress(){
        return $this->address;
    }
    public function setIdNoCurrent($id_no_current){
        $this->id_no_current = $id_no_current;
    }
    public function getIdNoCurrent(){
        return $this->id_no_current;
    }

    public function addRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL AddFaculty (?,?,?,?,?)");
            $sqlStament->execute([$this->id_no,$this->name,$this->email,$this->contact,$this->address]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getAll(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetFaculty");
            $sqlStament->execute();
            return $sqlStament->fetchAll(); 
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getByID(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetFacultyByID (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function checkExist(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL CheckExistFacultyIdNo (?)");
            $sqlStament->execute([$this->id_no]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function checkExist2(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL CheckExistFacultyIdNo2 (?,?)");
            $sqlStament->execute([$this->id_no,$this->id_no_current]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function updateRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL UpdateFaculty (?,?,?,?,?,?)");
            $sqlStament->execute([$this->id_no,$this->name,$this->email,$this->contact,$this->address,$this->id]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function deleteRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL DeleteFaculty (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

?>