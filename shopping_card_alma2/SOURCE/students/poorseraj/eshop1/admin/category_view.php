<!doctype html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <title>نمایش لیست دسته ها</title>
    <link href="../template/template1/css/main.css" rel="stylesheet">
    <link href="../template/template1/css/form.css" rel="stylesheet">
    <link href="../template/template1/css/menu.css" rel="stylesheet">
    <link href="../template/template1/css/table.css" rel="stylesheet">
    <link href="../template/template1/css/list.css" rel="stylesheet">
</head>
<body>

<div id="container">
    <div id="menu">
        <ul id="ul">
            <li><a href="index.php"><img src="../template/template1/image/icon/manage.png">&nbsp; مدیریت</a></li>
            <li><a href="category_view.php"><img src="../template/template1/image/icon/category.png">&nbsp;دسته</a></li>
            <li><a href="brand_view.php"><img src="../template/template1/image/icon/brand.png">&nbsp;برند</a></li>
            <li><a href="product_view.php"><img src="../template/template1/image/icon/product.png">&nbsp;محصول</a></li>
            <li><a href="customer_view.php"><img src="../template/template1/image/icon/customer.png">&nbsp;مشتریان</a>
            </li>
            <li><a href="#"><img src="../template/template1/image/icon/sale.png">&nbsp;فروش</a></li>
        </ul>
    </div>
    <div id="head" style="padding:5px;box-sizing:border-box;">
        <br/>
        <div class="center">
            <form name="search-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="search" name="search" id="search" placeholder="نام دسته">
                <input type="submit" value="جستجو">
            </form>
        </div>
        <br>
        <div class="center">
            <form name="edit-form" action="edit.php" method="post">
                <input type="search" name="edit" id="edit" placeholder="نام دسته">
                <input type="submit" value="ویرایش">
            </form>
        </div>
        <br>
        <div class="center">
            <form name="delete-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="search" name="delete" id="delete" placeholder="نام دسته">
                <input type="submit" value="حذف">
            </form>
        </div>

        <br/>
        <div class="info"><a href="category_add.php">افزودن دسته جدید</a></div>

        <table id="table-list">
            <tr>
                <td>کد دسته</td>
                <td>نام دسته</td>
                <td>توضیحات دسته</td>
                <td>عکس دسته</td>
            </tr>
            <?php

            require_once('../include/connect.php');


            // start delete --------------------------------------------------
            if (isset($_POST['delete'])) {
                $delete = trim($_POST['delete']);
                $sql = "DELETE FROM category WHERE cat_name='$delete'";
                $stmt = $con->query($sql);
                echo '<br><div class="info"> تعداد ' . $stmt->rowCount() . ' رکورد با موفقیت حذف شد</div>';
            }
            // end delete --------------------------------------------------

            // select all rows
            $sql = "SELECT * FROM category";

            // start search --------------------------------------------------
            if (isset($_POST['search'])) $search = $_POST['search'];

            if (isset($search) && $search != "") $sql = "SELECT * FROM category WHERE cat_name like '%$search%'";
            $stmt = $con->prepare($sql);
            if (isset($search)) $search = "%$search%";
            // end search --------------------------------------------------


            $stmt = $con->query($sql);

            $rowCount = $stmt->rowCount();
            echo '<br><div class="info">تعداد رکورد(ها): ' . $rowCount . '</div>';

            // object oriented show all rows
            while ($row = $stmt->fetchObject()) {
                echo '<tr>';
                echo '<td>' . $row->cat_id . '</td>';
                echo '<td>' . $row->cat_name . '</td>';
                echo '<td>' . $row->cat_desc . '</td>';
                echo '<td>' . '<img style="width:50px;height:50px;" src="../photo/category/' . $row->cat_pic . '">' . '</td>';
                echo '<tr>';
            }
            echo '</table>';


            $con = null;

            ?>


    </div>
</div>

</body>
</html>