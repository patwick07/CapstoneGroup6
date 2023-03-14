<?php
require_once 'database.php';
class classes{
    private $id;
    private $course_id;
    private $level;
    private $section;
    protected $dbCon;

    public function __construct($id=0,$course_id=0,$level="",$section="")
    {
        $this->id = $id;
        $this->course_id = $course_id;
        $this->level = $level;
        $this->section = $section;

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
    public function setCourseId($course_id){
        $this->course_id = $course_id;
    }
    public function getCourse(){
        return $this->course_id;
    }
    public function setLevel($level){
        $this->level = $level;
    }
    public function getDesc(){
        return $this->level;
    }
    public function setSection($section){
        $this->section = $section;
    }
    public function getSection(){
        return $this->section;
    }

    public function addRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL AddClass (?,?,?)");
            $sqlStament->execute([$this->course_id,$this->level,$this->section]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getAll(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetClass");
            $sqlStament->execute();
            return $sqlStament->fetchAll(); 
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function checkExist(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL CheckExistClass (?,?,?)");
            $sqlStament->execute([$this->course_id,$this->level,$this->section]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function deleteRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL DeleteClass (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

?>