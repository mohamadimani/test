<?php
class database
{

    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db = 'oopcms';
    private static $conn;

    private static function databace()
    { 
        session_start();
        $utf = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        self::$conn = new pdo('mysql:host=' . self::$host . ';dbname=' . self::$db, self::$user, self::$pass, $utf);
        return self::$conn;
    }
    public static function getDB()
    {
        return self::databace();
    }
}
