<?php
require_once 'database.php';
class course{
    private $id;
    private $course;
    private $desc;
    protected $dbCon;

    public function __construct($id=0,$course="",$desc="")
    {
        $this->id = $id;
        $this->course = $course;
        $this->desc = $desc;

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
    public function setCourse($course){
        $this->course = $course;
    }
    public function getCourse(){
        return $this->course;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }
    public function getDesc(){
        return $this->desc;
    }

    public function addRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL AddCourse (?,?)");
            $sqlStament->execute([$this->course,$this->desc]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getAll(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetCourses");
            $sqlStament->execute();
            return $sqlStament->fetchAll(); 
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getByID(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetCourseByID (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function updateRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL UpdateCourse (?,?,?)");
            $sqlStament->execute([$this->id,$this->course,$this->desc]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function deleteRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL DeleteCourse (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

?>