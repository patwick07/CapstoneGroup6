<?php
require_once("subject.class.php");
$record = new subject();
if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record->setId($_GET['id']);
        $record->deleteRecord();
        echo "<script>
            alert('Record DELETED!!❌');
            document.location='subject.page.php';
            </script>";
    }
}
?>