<!DOCTYPE html>
<html>
<?php
include_once("./partials/navbar.php");
?>

<div class="container">
    <h5 class="mt-4">Add admin</h5>

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
    $sql = "INSER INTO tbl_admin 
        full_name = '$full_name',
        username = '$username',
        password = '$password'
    ";

    //3. Execute Query and save data
    

    $res = mysqli_query($conn, $sql) or die(mysqli_error($mysqli->error));
} else {
    # Button no clicked
}

?>

</html>