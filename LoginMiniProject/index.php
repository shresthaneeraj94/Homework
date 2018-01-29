<?php
include_once 'actions/functions.php';
include_once 'includes/head.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-1">
                <?php echo displayMessage(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-2">
                <h1 class="btn btn-dark btn-block">WELCOME</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto mt-2">
                <h2>Login Form</h2>
            </div>
        </div>
        <form method="post" action="actions/loginAction.php">
            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <img src="img/img_avatar2.png" alt="Avatar" class="avatar">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label><b>Email</b></label>
                    <input type="text" placeholder="Enter email" class="form-control" name="email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" class="form-control" name="password" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <button type="submit" class="btn btn-success btn-block">Login</button>
                </div>
            </div>


        </form>

    </div>
<?php include_once 'includes/foot.php';