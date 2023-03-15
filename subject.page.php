<?php
require_once "subject.class.php";
$all = new subject();
$subjects = $all->getAll();
?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="course-container w-100">
            <div>
                <button class="btn btn-primary mt-3 mb-3">
                <a href="addSubject.page.php" class="text-decoration-none text-light">Add Subject</a>
                </button>
            </div>

            <div class="card">
                <div class="card-header">
                    <b>Subject List</b>
                </div>
            <div class="card-body">
                <table class="table table-striped table-hover table-bordered">
                    <tr>
                        <th class="text-center" width="10%">Id</th>
                        <th class="text-center">Subject</th>
                        <th class="text-center w-25">Action</th>
                    </tr>
                    <?php foreach($subjects as $key=>$val) {?>
                    <tr>
                        <td><?= $val ['id']?></td>
                        <td>
                            <p><b><?php echo ucwords($val['subject']) ?></b></p>
                            <small><i><?php echo $val['description'] ?></i></small>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <button class="btn btn-warning">
                                    <a href="editSubject.page.php?id=<?= $val['id']?>" class="text-decoration-none text-dark">Update</a>
                                </button>
                                <button class="btn btn-danger">
                                    <a class="text-decoration-none text-dark" href="deleteSubject.util.php?id=<?= $val['id']?>&req=delete">Delete</a>
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