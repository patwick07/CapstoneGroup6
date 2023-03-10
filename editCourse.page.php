<?php
require_once "course.class.php";
$data = new course();
$id = $_GET['id'];
$data->setId($id);
$course= $data->getByID();
$val = $course[0];

if(isset($_POST['edit'])){
    $data->setCourse($_POST['course']);
    $data->setDesc($_POST['desc']);
    $data->updateRecord();
    echo "<script>
            alert('Record Updated!💾✅');
            document.location='course.page.php';
        </script>";
}

?>
<?php include 'includes/head.inc.php'; ?>
    <?php include 'includes/sidebar.inc.php'; ?>

    <div class="container">
        <h1>Edit Course</h1>
        <form action="" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="course">Course</span>
                <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course" value="<?= $val["course"] ?>" aria-describedby="course">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="desc">Description</span>
                <input type="text" name="desc" id="desc" class="form-control" placeholder="Enter Course Description" value="<?= $val["description"] ?>" aria-describedby="desc">
            </div>
            <input type="submit" value="Update" name="edit" id="edit" class="btn btn-primary"/>
        </form>
    </div>
<?php include 'includes/foot.inc.php'; ?>