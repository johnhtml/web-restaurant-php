<!DOCTYPE html>
<?php include_once('../config/constants.php'); ?>
<html>

<head>
    <title>Login Food order app</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="d-flex flex-column justify-content-center m-4" id="login-container">

        <div class="d-flex justify-content-center mt-4">
            <h5 class="mt-4">Login</h5>
        </div>

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>

        <?php
        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
        <br>

        <div id="width-50">
            <form class="ml-4 mr-4" action="" method="POST">

                <div class="d-flex flex-column flex-sm-row justify-content-center mt-2">
                    <div class="col-2">
                        <label class="form-label" for="username">
                            Username
                        </label>
                    </div>
                    <div class="">
                        <input class="form-control ml-2 mr-2" type="text" name="username" placeholder="username">
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-center mt-2">
                    <div class="col-2">
                        <label class="form-label mt-2" for="password">
                            Password
                        </label>
                    </div>
                    <div class="">
                        <input class="form-control ml-2 mr-2" type="password" name="password" placeholder="Password">
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">

                    <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </input>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


<?php

// check if the login button was clicked
if (isset($_POST['submit'])) {
    // Process the login request
    //1. Get the data
    $username = $_POST['username'];
    $password = md5($_POST['password']);


    //2. Check whether the user with the password exists
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    //3. Execute the query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //4. Check the result
    $count = mysqli_num_rows($res);

    echo $sql;

    if ($count == 1) {
        $_SESSION['login'] = "<span class='badge rounded-pill text-bg-info'>Logged in Successfully</span>";
        $_SESSION['user'] = $username; //to chech if the user is already logged in



        header('location:' . SITE_URL . 'admin/');
    } else {
        $_SESSION['login'] = "<span class='badge rounded-pill text-bg-danger'>Login Failed</span>";
        header('location:' . SITE_URL . 'admin/login.php');
    }
}


?>