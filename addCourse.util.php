<?php
if(isset($_POST['save'])){
    require_once 'course.class.php';
    $addCourse = new course();
    $addCourse->setCourse($_POST['course']);
    $addCourse->setDesc($_POST['desc']);
    $addCourse->addRecord();
    echo "<script>alert('New Record Added to the Database➕✅');document.location='course.page.php'</script>";
}
?>