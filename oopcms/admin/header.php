<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="../accets/plugins/bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <link href="../accets/css/style.css" rel="stylesheet">

</head>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-secondary">Dashboard</a></li>
                    <li><a href="addBlog.php" class="nav-link px-2 text-white">Add Blog</a></li>
                    <li><a href="../index.php" class="nav-link px-2 text-white">Web Site</a></li>
                    <!-- <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li> -->
                    <!-- <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <div class="text-end">
                    <?php
                    if (isset($_SESSION['userinfo'])) { ?>
                        <a href="../class/adminController.php?logout">
                            <button type="button" class="btn btn-outline-light me-2">
                                Log Out
                            </button>
                        </a>
                    <?php } else { ?>
                        <a href="login.php">
                            <button type="button" class="btn btn-outline-light me-2">
                                Login
                            </button>
                        </a>
                    <?php } ?>
                    <a href="register.php"><button type="button" class="btn btn-warning">Sign-up</button></a>
                </div>
            </div>
        </div>
    </header>