<?php
require_once "student.class.php";
$all = new student();
$students = $all->getAll();
?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="course-container w-100">
            <div>
                <button class="btn btn-primary mt-3 mb-3">
                <a href="addStudent.page.php" class="text-decoration-none text-light">Add Student</a>
                </button>
            </div>

            <div class="card">
                <div class="card-header">
                    <b>Student List</b>
                </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th class="text-center" width="10%">Id</th>
                        <th class="text-center">Id No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Class</th>
                        <th class="text-center d-none">Class ID</th>
                        <th class="text-center w-25">Action</th>
                    </tr>
                    <?php foreach($students as $key=>$val) {?>
                    <tr>
                        <td><?= $val ['id']?></td>
                        <td><?= $val ['id_no']?></td>
                        <td><?= $val ['name']?></td>
                        <td>
                            <p><?php echo ucwords($val['class']) ?></p>
                        </td>
                        <td class="d-none"><?= $val ['class_id']?></td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <button class="btn btn-warning">
                                    <?php
                                    $param1 = $val['id'];
                                    $param2 = $val['id_no'];
                                    $param3 = $val['class_id'];
                                    $url = "editStudent.page.php?id=" . urlencode($param1) . "&id_no=" . urlencode($param2) . "&class_id=" . urlencode($param3);
                                    ?>
                                    <a href="<?php echo $url; ?>" class="text-decoration-none text-dark">Update</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="text-decoration-none text-dark" href="deleteStudent.util.php?id=<?= $val['id']?>&req=delete">Delete</a>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>