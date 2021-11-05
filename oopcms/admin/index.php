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



<?php include_once('footer.php'); ?>