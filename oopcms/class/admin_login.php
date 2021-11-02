<?php
include 'database.php';
class admin_login
{

    private static $conn;

    public static function login($userName, $password)
    {
        if (!$userName or !$password) {
            return [
                'status' => false,
                'info' => [],
                'error' => 'danger',
                'error_test' => 'نام کاربری یا رمز عبور را وارد کنید!'
            ];
        }
        
        self::$conn = database::getDB();
        $userInfo =self::$conn->prepare(' select * from `users` where `username`=? and `password`=? ');
        $userInfo->bindValue(1, $userName);
        $userInfo->bindValue(2, $password);
        $userInfo->execute();
        if ($userInfo2 = $userInfo->fetch(2)) {
            return [
                'status' => true,
                'info' => $userInfo2,
                'error' => 'success',
                'error_test' => 'باموفقیت وارد شدید'
            ];
        }
        return [
            'status' => false,
            'info' => [],
            'error' => 'danger',
            'error_test' => 'کاربری یافت نشد!'
        ];
    }
}
