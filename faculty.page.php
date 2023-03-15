<?php
require_once "faculty.class.php";
$all = new faculty();
$faculty = $all->getAll();
?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="course-container w-100">
            <div>
                <button class="btn btn-primary mt-3 mb-3">
                <a href="addFaculty.page.php" class="text-decoration-none text-light">Add Faculty</a>
                </button>
            </div>

            <div class="card">
                <div class="card-header">
                    <b>Faculty List</b>
                </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th class="text-center" width="5%">Id</th>
                        <th class="text-center">Id No.</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Contact</th>
                        <th class="text-center">Address</th>
                        <th class="text-center">Action</th>
                    </tr>
                    <?php foreach($faculty as $key=>$val) {?>
                    <tr>
                        <td><?= $val ['id']?></td>
                        <td><?= $val ['id_no']?></td>
                        <td><?= $val ['name']?></td>
                        <td><?= $val ['email']?></td>
                        <td><?= $val ['contact']?></td>
                        <td><?= $val ['address']?></td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <button class="btn btn-warning">
                                    <?php
                                    $param1 = $val['id'];
                                    $param2 = $val['id_no'];
                                    $url = "editFaculty.page.php?id=" . urlencode($param1) . "&id_no=" . urlencode($param2);
                                    ?>
                                    
                                    <a href="<?php echo $url; ?>" class="text-decoration-none text-dark">Update</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="text-decoration-none text-dark" href="deleteFaculty.util.php?id=<?= $val['id']?>&req=delete">Delete</a>
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