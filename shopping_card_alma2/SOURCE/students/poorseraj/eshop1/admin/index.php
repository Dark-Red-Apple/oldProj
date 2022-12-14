<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="../template/template1/css/main.css">
    <link rel="stylesheet" href="../template/template1/css/menu.css">
    <style>
        #statistics {
            width: 100%;
            height: 100px;
            margin-top: 50px;
        }

        #statistics > div {
            margin-top: 10px;
            color: darkolivegreen;
        }

        #content {
            width: 1200px;
            height: 400px;
            margin: 50px auto;
        }

        #content > div {
            width: 180px;
            height: 170px;
            background-color: #aaaaaa;
            margin-right: 50px;
            float: right;
        }

        #content > div > a > div {
            width: 180px;
        }

        #content > div > a > div:nth-child(1) {
            height: 140px;
        }

        #content > div:nth-child(1) > a > div:nth-child(1) {
            height: 140px;
            background: url("../template/template1/image/mng_icon/category.jpg") center/cover;
        }

        #content > div:nth-child(2) > a > div:nth-child(1) {
            height: 140px;
            background: url("../template/template1/image/mng_icon/brand.jpg") center/cover;
        }

        #content > div:nth-child(3) > a > div:nth-child(1) {
            height: 140px;
            background: url("../template/template1/image/mng_icon/product.jpg") center/cover;
        }

        #content > div:nth-child(4) > a > div:nth-child(1) {
            height: 140px;
            background: url("../template/template1/image/mng_icon/customer.jpg") center/cover;
        }

        #content > div:nth-child(5) > a > div:nth-child(1) {
            height: 140px;
            background: url("../template/template1/image/mng_icon/sale.jpg") center/cover;
        }

        #content > div > a > div:nth-child(2) {
            height: 30px;
            text-align: center;
            line-height: 30px;
        }
    </style>
</head>
<body>
<?php
$cat_count = $brand_count = $product_count = $customer_count = 0;
require_once("../include/connect.php");
try {
    $stmt = $con->query("select count(*) from category");
    $cat_count = $stmt->fetchColumn(0);
    $stmt = $con->query("select count(*) from brand");
    $brand_count = $stmt->fetchColumn(0);
    $stmt = $con->query("select count(*) from product");
    $product_count = $stmt->fetchColumn(0);
    $stmt = $con->query("select count(*) from customer");
    $customer_count = $stmt->fetchColumn(0);
} catch (PDOException $ex) {
    $ex->getMessage();
}
?>
<div id="container">
    <div id="menu">
        <ul id="ul">
            <li><a href="index.php"><img src="../template/template1/image/icon/manage.png">&nbsp; ????????????</a></li>
            <li><a href="category_view.php"><img src="../template/template1/image/icon/category.png">&nbsp;????????</a></li>
            <li><a href="brand_view.php"><img src="../template/template1/image/icon/brand.png">&nbsp;????????</a></li>
            <li><a href="product_view.php"><img src="../template/template1/image/icon/product.png">&nbsp;??????????</a></li>
            <li><a href="customer_view.php"><img src="../template/template1/image/icon/customer.png">&nbsp;??????????????</a>
            </li>
            <li><a href="#"><img src="../template/template1/image/icon/sale.png">&nbsp;????????</a></li>
        </ul>
    </div>
    <div id="statistics">
        <div class="center"><?php echo '?????????? ????????' . (string)$cat_count ?></div>
        <div class="center"><?php echo '?????????? ????????' . (string)$brand_count ?></div>
        <div class="center"><?php echo '?????????? ??????????' . (string)$product_count ?></div>
        <div class="center"><?php echo '?????????? ??????????' . (string)$customer_count ?></div>

    </div>
    <div id="content">
        <div><a href="category_view.php">
                <div></div>
                <div>???????????? ????????</div>
            </a></div>
        <div><a href="brand_view.php">
                <div></div>
                <div>???????????? ????????</div>
            </a></div>
        <div><a href="product_view.php">
                <div></div>
                <div>???????????? ??????????</div>
            </a></div>
        <div><a href="customer_view.php">
                <div></div>
                <div>???????????? ??????????????</div>
            </a></div>
        <div><a href="admin/sale_view.php">
                <div></div>
                <div>???????????? ????????</div>
            </a></div>
    </div>
</div>
</body>
</html>