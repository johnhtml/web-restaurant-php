<!DOCTYPE html>
<?php
include_once("./partials/navbar.php");
?>
<div class="container">
    <h5>Add Category</h5>
    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }

    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>

    <form class="mt-4" action="" method="POST" enctype="multipart/form-data">

        <div class="row mt-2">
            <div class="col-md-2">
                <label class="form-label" for="title">
                    Title
                </label>
            </div>
            <div class="col-md-8">
                <input class="form-control ml-2 mr-2" type="text" name="title" placeholder="Category Title">
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-2">
                <label class="form-label" for="image">
                    Select Image
                </label>
            </div>
            <div class="col-md-8">
                <input class="form-control ml-2 mr-2" type="file" name="image">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="featured">
                    Featured
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-check-input ml-2 mr-2" type="radio" name="featured" value="Yes">
                <label class="form-check-label" for="featured">
                    Yes
                </label>
                <input class="form-check-input ml-2 mr-2" type="radio" name="featured" value="No" checked>
                <label class="form-check-label" for="featured">
                    No
                </label>
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="active">
                    Active
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-check-input ml-2 mr-2" type="radio" name="active" value="Yes">
                <label class="form-check-label" for="active">
                    Yes
                </label>
                <input class="form-check-input ml-2 mr-2" type="radio" name="active" value="No" checked>
                <label class="form-check-label" for="active">
                    No
                </label>
            </div>
        </div>
        <div class="d-flex justify-content-end mt-2">
            <input type="submit" class="btn btn-outline-primary" name="submit" value="Add category">
            </input>
        </div>
    </form>

    <!-- Add category form ends -->
</div>
<?php
//was the submit button pressed
if (isset($_POST['submit'])) {
    //1.get the values from the form
    $title = $_POST['title'];

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

    // check if an image was selected
    //print_r($_FILES['image']);
    //die();
    if (isset($_FILES['image']['name'])) {
        # upload the image
        //at this point the name, source and destination path are needed
        $image_name = $_FILES['image']['name'];
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/" . $image_name;

        $upload = move_uploaded_file($source_path, $destination_path);

        //check if the image was uploaded
        if ($upload == FALSE) {
            //set the error message
            $_SESSION['upload'] = "<span class='badge rounded-pill text-bg-danger'>Failed to upload the image</span>";
            header('location:' . SITE_URL . 'admin/add-category.php');
            //stop the process
            die();
        }
    } else {
        #image is not available and its name will be set to blank
        $image_name = "";
    }

    //2. Creating the SQL query
    $sql = "INSERT INTO tbl_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
        ";

    //3. Execute the query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    //4. Check wheter the query was executed or not
    if ($res == TRUE) {
        # The query was executed and a new category was added
        $_SESSION['add'] = "<span class='badge rounded-pill text-bg-info'>Category Added Successfully</span>";
        # Redirect 
        header("location:" . SITE_URL . 'admin/manage-category.php');
    } else {
        # Error adding the new category
        $_SESSION['add'] = "<span class='badge rounded-pill text-bg-danger'>An error occurred adding the new category</span>";
        # Redirect
        header("location:" . SITE_URL . 'admin/manage-category.php');
    }
} else {
    # Button no clicked
}
?>
<?php
include_once("./partials/footer.php");
?>