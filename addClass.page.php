<?php
require_once "course.class.php";
$all = new course();
$courses = $all->getAll();
?>
<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="container">
            <h1>Add Class</h1>
            <form action="addClass.util.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="course_id">Course</span>
                    <select name="course_id" id="course_id" class="w-50">
                        <option value=""></option>
                        <?php foreach($courses as $key=>$val) {?>
                            <option value="<?php echo $val['id'] ?>"><?php echo $val['course'] ?></option>
                        <?php }?>    
                    </select>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="level">Level</span>
                    <input type="text" name="level" id="level" class="form-control" placeholder="Enter Level"  aria-describedby="level">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="section">Section</span>
                    <input type="text" name="section" id="section" class="form-control" placeholder="Enter Section"  aria-describedby="section">
                </div>
                <input type="submit" value="Save" name="save" id="save" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>