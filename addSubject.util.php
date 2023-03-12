<?php
if(isset($_POST['save'])){
    require_once 'subject.class.php';
    $addSubject = new subject();
    $addSubject->setSubject($_POST['subject']);
    $addSubject->setDesc($_POST['desc']);
    $addSubject->addRecord();
    echo "<script>alert('New Record Added to the Database➕✅');document.location='subject.page.php'</script>";
}
?>