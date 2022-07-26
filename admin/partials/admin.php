<div class="container">
    <h5>Manage admins</h5>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
        echo $_SESSION['delete'];
        unset($_SESSION['delete']);
    }

    if (isset($_SESSION['update'])) {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
    }

    if (isset($_SESSION['user-not-found'])) {
        echo $_SESSION['user-not-found'];
        unset($_SESSION['user-not-found']);
    }
    
    if (isset($_SESSION['pwd-do-not-match'])) {
        echo $_SESSION['pwd-do-not-match'];
        unset($_SESSION['pwd-do-not-match']);
    }

    if (isset($_SESSION['change-password'])) {
        echo $_SESSION['change-password'];
        unset($_SESSION['change-password']);
    }

    ?>
    <br />

    <div class="d-flex justify-content-end">
        <a href="./add-admin.php" class="btn btn-outline-primary">Add admin</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Food</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            //Query to gell al admin users
            $sql = "SELECT * FROM tbl_admin";

            //Execute the Query
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

            //Check wheter the query was executed
            if ($res == True) {
                //Count rows to chech if there is data stored in the db

                $rows = mysqli_num_rows($res);
                $i = 1;
                if ($rows > 0) {
                    #
                    while ($rows = mysqli_fetch_assoc($res)) {
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];

                        //Display values in the table
            ?>
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITE_URL; ?>admin/update-password.php?id=<?php echo $id; ?>" class=" btn btn-outline-primary">
                                    Change Password
                                </a>

                                <a href="<?php echo SITE_URL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class=" btn btn-outline-info">
                                    update admin
                                </a>

                                <a href="<?php echo SITE_URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn btn-outline-danger">
                                    delete admin
                                </a>
                            </td>
                        </tr>
            <?php
                    }
                }
            } else {
                //There is no data stored in the DB
            }

            ?>
        </tbody>
    </table>
</div>