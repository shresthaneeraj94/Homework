<?php
require_once 'actions/functions.php';
if(!isset($_SESSION['id'])){
    header("location:index.php");
    exit;
}
$user = [];
if (isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int)$_GET['id'];
    if($id!=$_SESSION['id']){
        $_SESSION['fail']="You have no right to update";
        header("location:users.php");
        exit;
    }
    $query = "select * from info where id={$id}";
    $result = mysqli_query($connect, $query);
    $user = mysqli_fetch_assoc($result);
    if (!$user) {
        header('Location: users.php');
        exit;
    }
} else {
    header('Location: users.php');
    exit;
}

?>
<?php require_once 'includes/head.php' ?>


    <div class="container">

    <div class="user-data-form mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto mt-2">
                <h2><i class="fa fa-edit"></i> Update User Info
                    <a href="users.php" class="btn btn-dark float-right text-light">Users</a>
                </h2>
                <hr>
                <?php echo displayMessage(); ?>

            </div>
        </div>
        <form method="post" action="actions/update_action.php">
            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label for="name">User Name</label>
                    <input type="text" value="<?= $user['name'] ?>" id="name" name="name" class="form-control"
                           placeholder="Input your name">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" value="<?= $user['email'] ?>" id="email" name="email" class="form-control"
                           placeholder="Input your email">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label for="address">Address</label>
                    <input type="text" value="<?= $user['address'] ?>" id="address" name="address" class="form-control"
                           placeholder="Input your address">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label for="gender">Gender</label> <br>
                    <input type="radio" <?= $user['gender'] == 'male' ? 'checked' : '' ?> name="gender" value="male">
                    Male &nbsp;&nbsp;&nbsp;
                    <input type="radio" <?= $user['gender'] == 'male' ? '' : 'checked' ?> name="gender" value="female">
                    Female
                </div>
            </div>


            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <label for="hobby">Hobby</label> <br>
                    <?php
                    $hobby = explode(',', $user['hobby']);

                    ?>
                    <input type="checkbox" <?= in_array('dancing', $hobby) ? 'checked' : '' ?> name="hobby[]"
                           value="dancing">
                    Singing &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" <?= in_array('singing', $hobby) ? 'checked' : '' ?> name="hobby[]"
                           value="singing"> Dancing &nbsp;&nbsp;&nbsp;
                    <input type="checkbox" <?= in_array('coding', $hobby) ? 'checked' : '' ?> name="hobby[]"
                           value="coding"> Coding
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mx-auto form-group mb-3">
                    <button type="submit" class="btn btn-success btn-block">Update User</button>
                </div>
            </div>


        </form>

    </div>

<?php require_once 'includes/foot.php' ?>