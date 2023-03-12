<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="container">
            <h1>Add Subject</h1>
            <form action="addSubject.util.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="subject">Subject</span>
                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject"  aria-describedby="subject">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="desc">Description</span>
                    <input type="text" name="desc" id="desc" class="form-control" placeholder="Enter Subject Description"  aria-describedby="desc">
                </div>
                <input type="submit" value="Save" name="save" id="save" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>