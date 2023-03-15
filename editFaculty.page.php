<?php
require_once "faculty.class.php";
$data = new faculty();
$id = $_GET['id'];
$id_no_current = $_GET['id_no'];
$data->setId($id);
$data->setIdNoCurrent($id_no_current);
$faculty= $data->getByID();
$val = $faculty[0];

if(isset($_POST['edit'])){
    $data->setIdNo($_POST['id_no']);
    $data->setName($_POST['name']);
    $data->setEmail($_POST['email']);
    $data->setContact($_POST['contact']);
    $data->setAddress($_POST['address']);
    if ($data->checkExist2()){
        echo "<script>alert('Id No. already exist!');document.location='faculty.page.php'</script>";
    }
    else {
        $data->updateRecord();
        echo "<script>
                alert('Record Updated!💾✅');
                document.location='faculty.page.php';
            </script>";
    }
}

?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>

        <div class="container">
            <h1>Edit Course</h1>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="id_no">Id No.</span>
                    <input type="text" name="id_no" id="id_no" class="form-control" placeholder="Enter Id Number" value="<?= $val["id_no"] ?>" aria-describedby="id_no">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" value="<?= $val["name"] ?>" aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="email">Email</span>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Name" value="<?= $val["email"] ?>" aria-describedby="email">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="contact">Contact</span>
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Contact" value="<?= $val["contact"] ?>" aria-describedby="contact">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="address">Address</span>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="<?= $val["address"] ?>" aria-describedby="address">
                </div>
                <input type="submit" value="Update" name="edit" id="edit" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>