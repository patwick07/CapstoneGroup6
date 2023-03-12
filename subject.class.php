<?php
require_once 'database.php';
class subject{
    private $id;
    private $subject;
    private $desc;
    protected $dbCon;

    public function __construct($id=0,$subject="",$desc="")
    {
        $this->id = $id;
        $this->subject = $subject;
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
    public function setSubject($subject){
        $this->subject = $subject;
    }
    public function getSubject(){
        return $this->subject;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }
    public function getDesc(){
        return $this->desc;
    }

    public function addRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL AddSubject (?,?)");
            $sqlStament->execute([$this->subject,$this->desc]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getAll(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetSubjects");
            $sqlStament->execute();
            return $sqlStament->fetchAll(); 
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function getByID(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL GetSubjectByID (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function updateRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL UpdateSubject (?,?,?)");
            $sqlStament->execute([$this->id,$this->subject,$this->desc]);
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
    public function deleteRecord(){
        try {
            $sqlStament = $this->dbCon->prepare("CALL DeleteSubject (?)");
            $sqlStament->execute([$this->id]);
            return $sqlStament->fetchAll();
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

?>