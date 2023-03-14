<?php
if(isset($_POST['save'])){
    require_once 'class.class.php';
    $addClass = new classes();
    $addClass->setCourseId($_POST['course_id']);
    $addClass->setLevel($_POST['level']);
    $addClass->setSection($_POST['section']);
    if ($addClass->checkExist()) {
        echo "<script>alert('Record already exist!');document.location='addClass.page.php'</script>";
    }
    else{
        $addClass->addRecord();
        echo "<script>alert('New Record Added to the Database➕✅');document.location='class.page.php'</script>";
    }
}
?>