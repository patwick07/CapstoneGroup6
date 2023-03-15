<?php
require_once "student.class.php";
require_once "class.class.php";
$data = new student();
$id = $_GET['id'];
$id_no_current = $_GET['id_no'];
$class_id = $_GET['class_id'];
$data->setId($id);
$data->setIdNoCurrent($id_no_current);
$faculty= $data->getByID();
$val = $faculty[0];
$data2 = new classes();
$classes = $data2->getAll();

if(isset($_POST['edit'])){
    $data->setIdNo($_POST['id_no']);
    $data->setName($_POST['name']);
    $data->setClassId($_POST['class_id']);
    if ($data->checkExist2()){
        echo "<script>alert('Id No. already exist!');document.location='student.page.php'</script>";
    }
    else {
        $data->updateRecord();
        echo "<script>
                alert('Record Updated!💾✅');
                document.location='student.page.php';
            </script>";
    }
}

?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>

        <div class="container">
            <h1>Edit Student</h1>
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
                    <span class="input-group-text" id="class_id">Class</span>
                    <select name="class_id" id="class_id" class="w-50">
                        <option value=""></option>
                        <?php foreach($classes as $key=>$val) {?>
                            <option value="<?php echo $val['id'] ?>" <?php echo ($val['id'] == $class_id ? "selected" : "") ?>><?php echo $val['class'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <input type="submit" value="Update" name="edit" id="edit" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>