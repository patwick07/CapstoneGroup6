<?php
require_once("faculty.class.php");
$record = new faculty();
if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record->setId($_GET['id']);
        $record->deleteRecord();
        echo "<script>
            alert('Record DELETED!!❌');
            document.location='faculty.page.php';
            </script>";
    }
}
?>