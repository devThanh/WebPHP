<?php
require_once('../../db/dbhelper.php');

$id = $name = $price = $thumbnail = $context = $id_category = '';
if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['thumbnail'])) {
        $thumbnail = $_POST['thumbnail'];
    }
    if (isset($_POST['content'])) {
        $context = $_POST['content'];
    }
    if (isset($_POST['id_category'])) {
        $id_category = $_POST['id_category'];
    }



    $created_at = $updated_at = date('Y-m-d H:s:i');
    //var_dump($created_at, $updated_at, $name, $id, $thumbnail, $price, $context);
    //Luu vao database
    //if ($id == '') {
    //echo "id " . $title;
    var_dump($id, $name, $price, $thumbnail, $context, $updated_at);
    $sql = "update product set title='$name', price=$price,thumbnail='$thumbnail',context='$context',id_category=$id_category,updated_at='$updated_at' WHERE id='$id'";
    // $sql = 'UPDATE product SET title = "' . $title . '", updated_at = "' . $updated_at . '",
    // thumbnail = "' . $thumbnail . '", context = "' . $context . '", price = "' . $price . '",
    // id_category = "' . $id_category . '" where id = ' . $id;
    // } else {
    //     $sql = "update product set(id,title,price, thumbnail, context,created_at,updated_at, id_category) values (" . '$id '," . '$name ' . "," . $price . " ," . '$thumbnail ' . "," . '$context ' . "," . '$created_at' . "," . '$updated_at' . "," . $id_category . ")";
    // }

    execute($sql);

    header('Location: index.php');
    die();
}

if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = "select * from product where id = '$id'";
    $productItem = executeSingleResult($sql);
    //var_dump($productItem);
    if ($productItem != null) {
        $id_category = $productItem['id_category'];
        $title = $productItem['title'];
        $price = $productItem['price'];
        $thumbnail = $productItem['thumbnail'];
        $context = $productItem['context'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Thêm/Sửa Danh Mục Sản Phẩm</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Quản Lý Danh Mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../product/">Quản Lý Sản Phẩm</a>
        </li>
    </ul>

    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Thêm/Sửa Sản Phẩm</h2>
            </div>
            <div class="panel-body">
                <form method="post">

                    <!-- <div class="form-group">
                        <label for="name">Ma Sản Phẩm:</label>
                        <input type="text" class="form-control" id="id" name="id" value="<?php echo $id ?>"></input>
                    </div> -->

                    <div class="form-group">
                        <label for="name">Tên Sản Phẩm:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $title ?>"></input>
                    </div>
                    <div class="form-group">
                        <label for="id_category">Danh Mục:</label>
                        <select class="form-control" name="id_category" id="id_category">
                            <option value="">--</option>
                            <?php
                            $sql          = 'select * from category';
                            $categoryList = executeResult($sql);
                            foreach ($categoryList as $item) {
                                if ($item['id'] == $id_category) {

                                    echo '<option selected value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                } else {
                                    echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                }
                            }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Giá Bán:</label>
                        <input required="true" type="text" class="form-control" id="price" name="price" value="<?= $price ?>">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail:</label>
                        <input required="true" type="text" class="form-control" id="thumbnail" name="thumbnail" value="<?= $thumbnail ?>">
                    </div>
                    <div class="form-group">
                        <label for="content">Tên Danh Mục:</label>
                        <textarea rows="5" class="form-control" id="content" name="content"><?php $context ?></textarea>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Sua</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>