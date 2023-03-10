<?php
require_once "course.class.php";
$all = new course();
$courses = $all->getAll();
?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="course-container w-100">
            <div>
                <button class="btn btn-primary mt-3 mb-3">
                <a href="addCourse.page.php" class="text-decoration-none text-light">Add Course</a>
                </button>
            </div>

            <div class="card">
                <div class="card-header">
                    <b>Course List</b>
                </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Course</th>
                        <th class="text-center w-25">Action</th>
                    </tr>
                    <?php foreach($courses as $key=>$val) {?>
                    <tr>
                        <td><?= $val ['id']?></td>
                        <td>
                            <p><b><?php echo ucwords($val['course']) ?></b></p>
                            <small><i><?php echo $val['description'] ?></i></small>
                        </td>
                        <td>
                            <button class="btn btn-warning">
                                <a href="editCourse.page.php?id=<?= $val['id']?>" class="text-decoration-none text-dark">Update</a>
                            </button>
                            <button class="btn btn-danger">
                                <a class="text-decoration-none text-dark" href="deleteCourse.util.php?id=<?= $val['id']?>&req=delete">Delete</a>
                            </button>
                        </td>
                    </tr>
                    <?php }?>
                </table>
            </div>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>