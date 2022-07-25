<!DOCTYPE html>
<html>
<?php include_once('partials/navbar.php'); ?>

<div class="container">
    <h5>Add Category</h5>
    <br>


    <!-- Add category form starts -->
    <form class="mt-4" action="" method="POST">

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="title">
                    Title
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="text" name="title" placeholder="Category Title">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="featured">
                    Featured
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-check-input ml-2 mr-2" type="radio" name="featured" value="Yes"> Yes
                <input class="form-check-input ml-2 mr-2" type="radio" name="featured" value="No" checked> No
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="active">
                    Active
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-check-input ml-2 mr-2" type="radio" name="active" value="Yes"> Yes
                <input class="form-check-input ml-2 mr-2" type="radio" name="active" value="No" checked> No
            </div>
        </div>

        <div class="d-flex justify-content-end mt-2">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Add Category">
            </input>
        </div>

    </form>

    <!-- Add category form ends -->

    <?php
    //was the submit button pressed
    if (isset($_POST['submit'])) {
        //1.get the values from the form
        $title = $_POST['title'];

        echo $_POST['title'];
        echo $_POST['featured'];
        echo $_POST['active'];

        //checking the radio buttons
        if (isset($_POST['featured'])) {
            # Get the value
            $featured = $_POST['featured'];
        } else {
            # Value
            $featured = 'No';
        }

        if (isset($_POST['active'])) {
            # Get the value
            $active = $_POST['active'];
        } else {
            # Value
            $active = 'No';
        }

        //2. Creating the SQL query
        $sql = "INSERT INTO tbl_category SET
            title = '$title',
            featured = '$featured',
            active = '$active'
        ";

        //3. Execute the query
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //4. Check wheter the query was executed or not
        if ($res == true) {
            # The query was executed and a new category was added
            $_SESSION['add'] = "<span class='badge rounded-pill text-bg-info'>Category Added Successfully</span>";
            # Redirect 
            header('location:' . SITE_URL . 'admin/manage-category.php');
        } else {
            # Error adding the new category
            $_SESSION['add'] = "<span class='badge rounded-pill text-bg-danger'>An error occurred adding the new category '$title' '$featured' '$sql'</span>";
            # Redirect 
            header('location:' . SITE_URL . 'admin/manage-category.php');
        }
    }
    ?>

</div>

<?php
include_once("./partials/footer.php");
?>

</html>