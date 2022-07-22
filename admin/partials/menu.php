<div class="container">
    <h5>Dashboard</h5>
    <br>
    <?php
    if (isset($_SESSION['login'])) {
        echo $_SESSION['login'];
        unset($_SESSION['login']);
    }
    ?>
    <br>
    <div class="d-flex flex-row flex-wrap justify-content-around mt-4">

        <div class="custom-card m-1">
            <h6>Categorias</h6>
            <p>Text texto</p>
        </div>

        <div class="custom-card m-1">
            <h6>Categorias</h6>
            <p>Text texto</p>
        </div>

        <div class="custom-card m-1">
            <h6>Categorias</h6>
            <p>Text texto</p>
        </div>

        <div class="custom-card m-1">
            <h6>Categorias</h6>
            <p>Text texto</p>
        </div>

        <div class="custom-card m-1">
            <h6>Categorias</h6>
            <p>Text texto</p>
        </div>
    </div>
</div>