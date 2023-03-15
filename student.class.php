<?php
require_once 'database.php';
class student{
    private $id;
    private $id_no;
    private $class_id;
    private $name;
    private $id_no_current;
    protected $dbCon;

    public function __construct($id=0,$id_no="",$class_id=0,$name="",$id_no_current="")
    {
        $this->id = $id;
        $this->id_no = $id_no;
        $this->class_id = $class_id;
        $this->name = $name;
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
    public function setClassId($class_id){
        $this->class_id = $class_id;
    }
    public function getClassId(){
        return $this->class_id;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setIdNoCurrent($id_no_current){
        $this->id_no_current = $id_no_current;
    }
    public function getIdNoCurrent(){
        return $this->id_no_current;
    }

    public function addRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL AddStudent (?,?,?)");
            $sqlStament->execute([$this->id_no,$this->class_id,$this->name]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getAll(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetStudents");
            $sqlStament->execute();
            return $sqlStament->fetchAll(); 
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getByID(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetStudentById (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function checkExist(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL CheckExistStudentIdNo (?)");
            $sqlStament->execute([$this->id_no]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function checkExist2(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL CheckExistStudentIdNo2 (?,?)");
            $sqlStament->execute([$this->id_no,$this->id_no_current]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function updateRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL UpdateStudent (?,?,?,?)");
            $sqlStament->execute([$this->id,$this->id_no,$this->class_id,$this->name]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function deleteRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL DeleteStudent (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

?>