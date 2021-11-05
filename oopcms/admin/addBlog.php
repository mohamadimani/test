<?php include_once('header.php');

if (!isset($_SESSION['userinfo'])) {
    header('location:login.php');
} ?>


<style>
    .error {
        width: 100%;
        height: 45px;
        border-radius: 5px;
        box-shadow: 1px 1px 3px silver;
        line-height: 45px;
        color: white !important;
        font-weight: bold;
        font-size: 18px;
        text-shadow: 1px 1px 3px #8b8b8b;
    }

    .danger {
        background-color: pink;
    }

    .success {
        background-color: yellowgreen;
    }
</style>
<!-- Subheading -->
<?php
if (isset($_SESSION['error'])) { ?>
    <p class="text-muted error text-center mb-5 <?= $_SESSION['error']['error'] ?>" style="direction: rtl;">
        <?= $_SESSION['error']['error_text'] ?>
    </p>
<?php unset($_SESSION['error']);
} ?>


<div class="container">
    <div class="row">
        <form method="post" action="../class/adminController.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">title </label>
                <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">summary</label>
                <input name="summary" type="text" class="form-control" id="exampleInputPassword2" placeholder="summary">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">content</label>
                <textarea name="content" type="te" class="form-control" id="exampleInputPassword3" placeholder="content"></textarea>
            </div>
            <br>
            <div class="form-group">
                <label for="exampleInputPassword1">image : </label>
                <input type="file" name="image">
            </div>
            <br>
            <button type="submit" name="addblogbtn" class="btn btn-primary">save</button>
        </form>
    </div>
</div>


<?php include_once('footer.php'); ?>