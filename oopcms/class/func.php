<?php

include 'database.php';
class func
{
    private static $conn;
    public function __construct()
    {
    }
    public static function login($userName, $password)
    {
        if (!$userName or !$password) {
            $_SESSION['error'] = [
                'status' => false,
                'info' => [],
                'error' => 'danger',
                'error_text' => 'نام کاربری یا رمز عبور را وارد کنید!'
            ];
            header('location:../admin/login.php');
            exit();
        }

        self::$conn = database::getDB();
        $userInfo = self::$conn->prepare(' select * from `users` where `username`=? and `password`=? ');
        $userInfo->bindValue(1, $userName);
        $userInfo->bindValue(2, $password);
        $userInfo->execute();
        if ($userInfo2 = $userInfo->fetch(2)) {
            $_SESSION['userinfo'] = $userInfo2;
            $_SESSION['error'] =  [
                'status' => true,
                'info' => $userInfo2,
                'error' => 'success',
                'error_text' => 'باموفقیت وارد شدید'
            ];
            header('location:../admin/index.php');
            exit();
        }
        $_SESSION['error'] = [
            'status' => false,
            'info' => [],
            'error' => 'danger',
            'error_text' => 'کاربری یافت نشد!'
        ];
        header('location:../admin/login.php');
        exit();
    }

    public static function saveBlog($title, $summary, $content)
    {
        if (!$title or !$summary or !$content) {
            $_SESSION['error'] = [
                'status' => false,
                'info' => [],
                'error' => 'danger',
                'error_text' => 'اطلاعات را کامل وارد کنید!'
            ];
            header('location:../admin/addBlog.php');
            exit();
        }
        self::$conn = database::getDB();
        $res = self::$conn->prepare('insert into blogs(title , summary, content) values(?,?,?)');
        $res->bindValue(1, $title);
        $res->bindValue(2, $summary);
        $res->bindValue(3, $content);
        if ($res->execute()) {
            $_SESSION['error'] =  [
                'status' => true,
                'info' => null,
                'error' => 'success',
                'error_text' => 'باموفقیت ثبت شد'
            ];
            header('location:../admin/addBlog.php');
            exit();
        }
        $_SESSION['error'] = [
            'status' => false,
            'info' => [],
            'error' => 'danger',
            'error_text' => 'مشکل در ثبت!'
        ];
        header('location:../admin/login.php');
        exit();
    }

    public static function getBlog($blogId = '')
    {
        self::$conn = database::getDB();
        $where = '';
        if (isset($blogId) and !empty($blogId)) {
            $where = ' where id = ? ';
        }
        $blogs = self::$conn->prepare('select * from blogs ' . $where . ' order by id desc');
        if (isset($blogId) and !empty($blogId)) {
            $blogs->bindParam(1, $blogId);
            return ($blogs->execute() ? $blogs->fetch(2) : []);
        }
        return ($blogs->execute() ? $blogs->fetchAll(2) : []);
    }
}
