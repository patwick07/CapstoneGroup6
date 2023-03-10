<?php include 'includes/head.inc.php'; ?>
    <?php include 'includes/sidebar.inc.php'; ?>
    <div class="container">
        <h1>Add Course</h1>
        <form action="addCourse.util.php" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text" id="course">Course</span>
                <input type="text" name="course" id="course" class="form-control" placeholder="Enter Course"  aria-describedby="course">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="desc">Description</span>
                <input type="text" name="desc" id="desc" class="form-control" placeholder="Enter Course Description"  aria-describedby="desc">
            </div>
            <input type="submit" value="Save" name="save" id="save" class="btn btn-primary"/>
        </form>
    </div>
<?php include 'includes/foot.inc.php'; ?>