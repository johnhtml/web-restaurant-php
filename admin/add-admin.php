<!DOCTYPE html>
<html>
<?php
include_once("./partials/navbar.php");
?>

<div class="container">
    <h5 class="mt-4">Add admin</h5>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }
    ?>
    <br />


    <form class="mt-4" action="" method="POST">

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="full_name">
                    Full name
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="text" name="full_name" placeholder="Full name example">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="username">
                    Username
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="text" name="username" placeholder="Username example">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="password">
                    Password
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="password" name="password" placeholder="password">
            </div>
        </div>

        <div class="d-flex justify-content-end mt-2">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Add admin">
            </input>
        </div>

    </form>
</div>

<?php
include_once("./partials/footer.php");
include_once("./partials/script.php");
?>

<?php
//Process the Value from the Form and Save it in the DB

//Check wheter the submit button is clicked or not

if (isset($_POST['submit'])) {
    # Button clicked

    #1. Get the data form the Form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    #2. SQL Query to save the data in the database
    $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
    ";

    //3. Execute Query and save data
    $res = mysqli_query($conn, $sql) or die('error query');

    //4. Check wheter the Query is executed (the data is inserted)
    //or not and display a message according the result
    if ($res == TRUE) {
        # Data inserted
        //echo 'Data inserted';
        //Create a Session Instance to display
        $_SESSION['add'] = "Admin Added Successfully";

        //Redirect page to manage admin
        header("location:" . SITE_URL . 'admin/manage-admin.php');
    } else {
        # Data no inserted
        echo 'Data not inserted';

        //Create a Session Instance to display
        $_SESSION['add'] = "Failed to Add Admin";
        //Redirect page to manage admin
        header("location:" . SITE_URL . 'admin/add-admin.php');
    }
} else {
    # Button no clicked
}

?>

</html>