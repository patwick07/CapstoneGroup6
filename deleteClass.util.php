<?php
require_once("class.class.php");
$record = new classes();
if(isset($_GET['id']) && isset($_GET['req'])){
    if($_GET['req'] == "delete"){
        $record->setId($_GET['id']);
        $record->deleteRecord();
        echo "<script>
            alert('Record DELETED!!❌');
            document.location='class.page.php';
            </script>";
    }
}
?>