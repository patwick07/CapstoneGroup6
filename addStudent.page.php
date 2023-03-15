<?php
require_once "class.class.php";
$all = new classes();
$classes = $all->getAll();
?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="container">
            <h1>Add Student</h1>
            <form action="addStudent.util.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="id_no">Id No.</span>
                    <input type="text" name="id_no" id="id_no" class="form-control" placeholder="Enter Id Number"  aria-describedby="id_no">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"  aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="class_id">Class</span>
                    <select name="class_id" id="class_id" class="w-50">
                        <option value=""></option>
                        <?php foreach($classes as $key=>$val) {?>
                            <option value="<?php echo $val['id'] ?>"><?php echo $val['class'] ?></option>
                        <?php }?>
                    </select>
                </div>
                <input type="submit" value="Save" name="save" id="save" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>