<?php
include_once 'actions/functions.php';
include_once 'includes/head.php';
if(!isset($_SESSION['id'])){
    header("location:index.php");
    exit;
}
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Signup</title>
    </head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto form-group mb-3">
            <?php echo displayMessage(); ?>
        </div>
    </div>

    <?php echo displayMessage(); ?>
    <form method="POST" action="actions/signupAction.php">
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Name: <input type="text" name="name" class="form-control" placeholder="Input your name"></p>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Email: <input type="text" name="email" class="form-control" placeholder="Input your email"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Password: <input type="password" name="password" class="form-control" placeholder="Input your password">
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p>Confirm Password: <input type="password" name="cpassword" class="form-control" placeholder="Input your password">
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Address: <input type="text" name="address" class="form-control" placeholder="Input your address">
                </p></div>
        </div>

        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <label for="gender">Gender</label> <br>
                <input type="radio" name="gender" value="male"> Male &nbsp;&nbsp;&nbsp;
                <input type="radio" name="gender" value="female"> Female
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <label for="hobby">Hobby</label> <br>
                <input type="checkbox" name="hobby[]" value="dancing"> Singing &nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="hobby[]" value="singing"> Dancing &nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="hobby[]" value="coding"> Coding
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <input type="submit" class="btn btn-success btn-block" value="Signup">
            </div>
        </div>
    </form>
</div>
<?php include_once 'includes/foot.php';