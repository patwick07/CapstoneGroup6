<?php
require_once("student.class.php");
$record = new student();
if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record->setId($_GET['id']);
        $record->deleteRecord();
        echo "<script>
            alert('Record DELETED!!❌');
            document.location='student.page.php';
            </script>";
    }
}
?>