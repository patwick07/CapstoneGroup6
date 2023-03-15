<?php
if(isset($_POST['save'])){
    require_once 'faculty.class.php';
    $addFaculty = new faculty();
    $addFaculty->setIdNo($_POST['id_no']);
    $addFaculty->setName($_POST['name']);
    $addFaculty->setEmail($_POST['email']);
    $addFaculty->setContact($_POST['contact']);
    $addFaculty->setAddress($_POST['address']);
    if ($addFaculty->checkExist()) {
        echo "<script>alert('Id No. already exist!');document.location='addFaculty.page.php'</script>";
    }
    else{
        $addFaculty->addRecord();
        echo "<script>alert('New Record Added to the Database➕✅');document.location='faculty.page.php'</script>";
    }
}
?>