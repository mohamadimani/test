<?php include_once('include/header.php') ?>

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
            height: 300px;
            float: right;
            padding: 15px;
            border-bottom: 1px solid silver;
            box-sizing: border-box;

        }

        .rightBox img {
            width: 100%;
            height: 100%;
            border-radius: 5px;
            box-shadow: 1px 1px 3px silver;
        }

        .rightBox,
        .leftBox {
            width: 50%;
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
            height: 200px;
            overflow: hidden;
            margin: 0;
            padding: 10px;
            box-sizing: border-box;
            font-weight: bold;
            line-height: 30px;
        }

        .leftBottomBox {
            float: right;
            width: 100%;
            height: auto;
        }

        .boxBTN {
            width: 85px;
            height: 40px;
            line-height: 40px;
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
    </style>


<br>
<br>
<div class="main">
    <div class="row">
        <?php foreach (func::getBlog() as $blog) { ?>
            <div class="postBox">
                <div class="rightBox">
                    <!-- <img src="accets/images/<?= $blog->image ?>" alt=""> -->
                </div>
                <div class="leftBox">
                    <p class="boxText">
                        <?= $blog['title'] ?>
                        <br>
                        <?= $blog['content'] ?>
                    </p>
                    <div class="leftBottomBox">
                        <a href="index.php" class="boxBTN">مشاهده</a>
                    </div>
                </div>
            </div>
        <?php } ?>


    </div>
</div>



<?php include_once('include/footer.php') ?>
</body>

</html>