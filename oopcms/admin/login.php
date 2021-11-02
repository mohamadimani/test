<?php
include_once('../class/admin_login.php');
include_once('header.php');
    
$result = '';
if (isset($_POST['username']) and isset($_POST['password'])) {
    $result = admin_login::login($_POST['username'], $_POST['password']);
    if ($result['status']) {
        $_SESSION['userInfo'] = $result['info'];
    }
} 


if (isset($_SESSION['userInfo'])) {
    header('location:index.php');
}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">

            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                Sign in
            </h1>
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
                }

                .danger {
                    background-color: pink;
                }

                .success {
                    background-color: yellowgreen;
                }
            </style>
            <!-- Subheading -->
            <?php if (isset($result['error'])) { ?>
                <p class="text-muted error text-center mb-5 <?= $result['error'] ?>" style="direction: rtl;">
                    <?= $result['error_test'] ?>
                </p>
            <?php } ?>
            <!-- Form -->
            <form method="post" action="#">
                <!-- Email address -->
                <div class="form-group">
                    <!-- Label -->
                    <label class="form-label">
                        User Name
                    </label>
                    <!-- Input -->
                    <input type="text" class="form-control" name="username">
                </div>
                <!-- Password -->
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <!-- Label -->
                            <label class="form-label">
                                Password
                            </label>
                        </div>
                        <div class="col-auto">
                            <!-- Help text -->
                            <a href="password-reset-cover.html" class="form-text small text-muted">
                            </a>
                        </div>
                    </div> <!-- / .row -->
                    <!-- Input group -->
                    <div class="input-group input-group-merge">
                        <!-- Input -->
                        <input class="form-control" type="password" placeholder="Enter your password" name="password">
                        <!-- Icon -->
                        <span class="input-group-text">
                            <i class="fe fe-eye"></i>
                        </span>
                    </div>
                </div>

                <!-- Submit -->
                <button class="btn btn-lg w-100 btn-primary mb-3">
                    Sign in
                </button>

                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        <a href="signUp.php">Sign up</a>.
                    </small>
                </div>

            </form>

        </div>
    </div> <!-- / .row -->
</div>

<?php include_once('footer.php') ?>
</body>

</html>