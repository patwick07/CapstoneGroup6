<?php
if(isset($_POST['save'])){
    require_once 'student.class.php';
    $addStudent = new student();
    $addStudent->setIdNo($_POST['id_no']);
    $addStudent->setName($_POST['name']);
    $addStudent->setClassId($_POST['class_id']);
    if ($addStudent->checkExist()) {
        echo "<script>alert('Id No. already exist!');document.location='addStudent.page.php'</script>";
    }
    else{
        $addStudent->addRecord();
        echo "<script>alert('New Record Added to the Database➕✅');document.location='student.page.php'</script>";
    }
}
?>