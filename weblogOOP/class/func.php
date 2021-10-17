<?php
include_once 'db.php';
class func
{
    private static $db;

    public static function getBlog()
    {
        self::$db = db::getDB();
        $blogs = self::$db->prepare('select * from blogs order by id desc');
        return ($blogs->execute() ? $blogs->fetchAll(5) : []);
    }
    public static function updateBlog($title, $content, $image, $id)
    {
        self::$db = db::getDB();
        $blogs = self::$db->prepare('update blogs set title=? , content=?  where id=? ');
        $blogs->bindParam(1, $title);
        $blogs->bindParam(2, $content);
        $blogs->bindParam(3, $id);
        if (!$blogs->execute()) {
            return false;
        }

        if ($image['size'] > 1) {
            return self::uploadImage($image, $id);
        }
        return true;
    }

    public static function insertBlog($title, $content, $image)
    {
        if (empty($content)) {
            return true;
        }
        self::$db = db::getDB();
        $blogs = self::$db->prepare('insert into  blogs set title=? , content=? ');
        $blogs->bindParam(1, $title);
        $blogs->bindParam(2, $content);
        if (!$blogs->execute()) {
            return false;
        }

        if ($image['size'] > 1) {
            $id = self::$db->lastInsertId();
            return self::uploadImage($image, $id);
        }
        return true;
    }

    public static function uploadImage($image, $id)
    {
        $newName = time() . '.jpg';
        $url = '../accets/images/' . $newName;
        move_uploaded_file($image['tmp_name'], $url);

        $blogs = self::$db->prepare('update blogs set image=?    where id=? ');
        $blogs->bindParam(1, $newName);
        $blogs->bindParam(2, $id);
        if (!$blogs->execute()) {
            return false;
        }
        return true;
    }

    public static function deleteBlog($id)
    {
        self::$db = db::getDB();
        $blogs = self::$db->prepare('delete from  blogs where id=? ');
        $blogs->bindParam(1, $id);
        if (!$blogs->execute()) {
            return false;
        }
        return true;
    }
}
