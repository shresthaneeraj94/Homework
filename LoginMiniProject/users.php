<?php
include_once 'actions/functions.php';
include_once 'includes/head.php';
if(!isset($_SESSION['id'])){
    header("location:index.php");
    exit;
}
$query = "SELECT * FROM info";
$result = mysqli_query($connect, $query);
$numOfRows = mysqli_num_rows($result);
?>


    <div class="container">
    <div class="user-data-form">
        <div class="row">
            <div class="col-md-10 mx-auto mt-2">
                <h2><i class="fa fa-users"></i> Users
                    <a href="signup.php" class="btn btn-dark float-right text-light">Add New User</a>
                </h2>
                <hr>
                <?php echo displayMessage(); ?>

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th width="2%">S.No.</th>
                        <th width="15%"><i class="fa fa-user"></i> User Name</th>
                        <th width="25%"><i class="fa fa-envelope"></i> Email</th>
                        <th><i class="fa fa-map-marker"></i> Address</th>
                        <th width="5%"> Gender</th>
                        <th>Hobby</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php if ($numOfRows > 0): ?>

                        <?php $i = 1;
                        while ($row = mysqli_fetch_assoc($result)): ?>

                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= ucfirst($row['name']) ?> <br>
                                    <?php if($row['id']==$_SESSION['id']): ?>
                                    <a href="Profile.php" class="btn btn-primary btn-sm">View Profile</a>
                                    <?php else: ?>
                                 <a href="viewProfile.php?id=<?=$row['id']?>" class="btn btn-primary btn-sm">View Profile</a>
                                   <?php endif; ?>
                                </td>
                                <td><?= $row['email'] ?></td>
                                <td><?= ucfirst($row['address']) ?></td>
                                <td><?= ($row['gender'] === 'male') ? '<i class="fa fa-male fa-2x text-primary" aria-hidden="true"></i>' : '<i class="fa fa-female fa-2x text-danger" aria-hidden="true"></i>' ?></td>
                                <td>
                                    <?php
                                    $hobbies = explode(',', $row['hobby']);
                                    foreach ($hobbies as $hobby) {
                                        echo '<span class="badge badge-secondary">' . $hobby . '</span> ';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a onclick="return confirm('Are you sure ?')"
                                       href="actions/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i></a>
                                    <a href="update.php?id=<?= $row['id'] ?>"
                                       class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; else: ?>
                        <tr>
                            <td colspan="7">
                                <i class="fa fa-user-times"></i> No Users found
                                <a href="insert.php">
                                    Add User
                                </a>
                            </td>
                        </tr>
                    <?php endif; ?>

                    </tbody>

                </table>
            </div>
        </div>


    </div>

<?Php include_once 'includes/foot.php';
?>