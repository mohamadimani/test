<?php
include_once('../class/func.php');

if (isset($_POST['loginbtn'])) {
    func::login($_POST['username'], $_POST['password']);
}
if (isset($_POST['addblogbtn'])) {
    func::saveBlog($_POST['title'], $_POST['summary'], $_POST['content']);
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:../admin/login.php');
}
