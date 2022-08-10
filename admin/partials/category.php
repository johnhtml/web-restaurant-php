<div class="container">
    <h5>Category</h5>

    <br>
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
    <br>

    <div class="d-flex justify-content-end">
        <a href="<?php echo SITE_URL; ?>admin/add-category.php" class="btn btn-outline-primary">Add Category</a>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Username</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>
                    <a href="#" class="btn btn-outline-info">
                        update admin
                    </a>

                    <a href="#" class="btn btn-outline-danger">
                        delete admin
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>
                    <a href="#" class="btn btn-outline-info">
                        update admin
                    </a>

                    <a href="#" class="btn btn-outline-danger">
                        delete admin
                    </a>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Thornton</td>
                <td>
                    <a href="#" class="btn btn-outline-info">
                        update admin
                    </a>

                    <a href="#" class="btn btn-outline-danger">
                        delete admin
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>