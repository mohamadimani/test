<?php

class db
{
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db = 'test';
    private static $conn;

    private static function connectDB()
    {
        $utf = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        db::$conn = new pdo('mysql:host=' . self::$host . ';dbname=' . db::$db, db::$user, db::$pass, $utf);
        return self::$conn;
    }
    public static function getDB()
    {
        return self::connectDB();
    }
}
