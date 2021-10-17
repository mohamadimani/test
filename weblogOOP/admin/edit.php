<?php
include_once '../class/func.php';

$error = '';
if (isset($_POST['delete']) and func::deleteBlog($_POST['id'])) {
    $error = 'با موفقیت حذف شد !';
} else if (isset($_POST['delete']) and !func::deleteBlog($_POST['id'])) {
    $error = 'مشکل در حذف !';
}

if (isset($_POST['id']) and isset($_POST['BTN'])) {
    if (func::updateBlog($_POST['title'], $_POST['content'], $_FILES['image'], $_POST['id'])) {
        $error = 'با موفقیت ثبت شد !';
    } else {
        $error = 'مشکل در ثبت !';
    }
} else if (!isset($_POST['id']) and isset($_POST['BTN']) and isset($_POST['title'])) {
    if (func::insertBlog($_POST['title'], $_POST['content'], $_FILES['image'])) {
        $error = 'با موفقیت ثبت شد !';
    } else {
        $error = 'مشکل در ثبت !';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog</title>
    <style>
        body {
            background-color: silver;
            direction: rtl;
        }

        .main {
            width: 80%;
            float: right;
            margin: 0 10%;
            padding: 15px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 1px 1px 3px silver;
        }

        .postBox {
            width: 100%;
            height: 200px;
            float: right;
            padding: 5px;
            border-bottom: 1px solid silver;
            box-sizing: border-box;

        }

        .errorBox h3 {
            margin: 0;
        }

        .errorBox {
            width: 100%;
            height: 50px;
            float: right;
            padding: 5px;
            border-bottom: 1px solid silver;
            box-sizing: border-box;
            border-radius: 5px;
            background-color: #b0b2ff;
            color: white;
            text-align: center;
            line-height: 40px;
        }

        .rightBox img {
            width: 100%;
            height: 100px;
            border-radius: 5px;
            box-shadow: 1px 1px 3px silver;
        }

        .rightBox {
            width: 30%;
        }

        .leftBox {
            width: 68%;
        }

        .rightBox,
        .leftBox {
            height: 100%;
            float: right;
            padding: 5px;
            box-sizing: border-box;
        }

        .boxText {
            text-align: center;
            font-size: 16px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            width: 100%;
            height: 150px;
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-weight: bold;
            line-height: 30px;
        }

        .leftBottomBox {
            float: right;
            width: 100%;
            height: auto;
        }

        .boxBTN,
        .deleteBTN {
            min-width: 80px;
            height: 35px;
            line-height: 30px;
            text-align: center;
            border-radius: 5px;
            background-color: rgb(100, 100, 255);
            box-shadow: 1px 1px 3px silver;
            float: left;
            font-size: 16px;
            color: white;
            text-decoration: none;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

        }

        .deleteBTN {
            background-color: rgb(200, 100, 155);
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="row">
            <?php if ($error) { ?>
                <div class="errorBox">
                    <h3><?= $error ?></h3>
                </div>
            <?php } ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="postBox">
                    <div class="rightBox">
                        <h3>انتخاب تصویر</h3>
                        <input type="file" name="image">
                    </div>
                    <div class="leftBox">
                        <p class="boxText">
                            <input type="text" name="title" value="" placeholder="عنوان">
                            <br>
                            <textarea name="content" id="" cols="60" rows="7" placeholder="محتوا..."></textarea>
                        </p>
                        <div class="leftBottomBox">
                            <button type="submit" name="BTN" class="boxBTN">افزودن جدید</button>
                        </div>
                    </div>
                </div>
            </form>


            <?php foreach (func::getBlog() as $blog) { ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="postBox">
                        <div class="rightBox">
                            <img src="../accets/images/<?= $blog->image ?>" alt="">
                            <input type="file" name="image">
                        </div>
                        <div class="leftBox">
                            <p class="boxText">
                                <input type="text" name="title" value="<?= $blog->title ?>">
                                <input type="hidden" name="id" value="<?= $blog->id ?>">
                                <br>
                                <textarea name="content" id="" cols="60" rows="7"><?= $blog->content ?></textarea>
                            </p>
                            <div class="leftBottomBox">
                                <button type="submit" name="BTN" class="boxBTN">ثبت</button>
                                <button type="submit" name="delete" class="deleteBTN">حذف</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>

        </div>
    </div>

</body>

</html>