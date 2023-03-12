<?php
require_once "subject.class.php";
$data = new subject();
$id = $_GET['id'];
$data->setId($id);
$subject= $data->getByID();
$val = $subject[0];

if(isset($_POST['edit'])){
    $data->setSubject($_POST['subject']);
    $data->setDesc($_POST['desc']);
    $data->updateRecord();
    echo "<script>
            alert('Record Updated!💾✅');
            document.location='subject.page.php';
        </script>";
}

?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>

        <div class="container">
            <h1>Edit Subject</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="subject">Subject</span>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject" value="<?= $val["subject"] ?>" aria-describedby="subject">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="desc">Description</span>
                    <input type="text" name="desc" id="desc" class="form-control" placeholder="Enter Subject Description" value="<?= $val["description"] ?>" aria-describedby="desc">
                </div>
                <input type="submit" value="Update" name="edit" id="edit" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>