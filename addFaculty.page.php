<?php include 'includes/head.inc.php'; ?>
    <div class="d-flex flex-row">
        <?php include 'includes/sidebar.inc.php'; ?>
        <div class="container">
            <h1>Add Faculty</h1>
            <form action="addFaculty.util.php" method="post">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="id_no">Id No.</span>
                    <input type="text" name="id_no" id="id_no" class="form-control" placeholder="Enter Id Number"  aria-describedby="id_no">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="name">Name</span>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"  aria-describedby="name">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="email">Email</span>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email"  aria-describedby="email">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="contact">Contact</span>
                    <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Contact"  aria-describedby="contact">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="address">Address</span>
                    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address"  aria-describedby="address">
                </div>
                <input type="submit" value="Save" name="save" id="save" class="btn btn-primary"/>
            </form>
        </div>
    </div>
<?php include 'includes/foot.inc.php'; ?>