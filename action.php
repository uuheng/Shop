<?php
echo "asdfasdf";
require("dbconfig.php");
// require("functions.php");
$link = mysql_connect(HOST, USER, PASS) or die("数据库连接失败");
mysql_select_db(DBNAME);

function Add(){
    $name = $_POST['name'];
    $typeid = $_POST['typeid'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    $pic = $_POST['pic'];
    $note = $_POST['note'];
    $addtime = time();
    //此处应该验证if.....

    $upinfo = uploadFile("pic", "./uploads/");
    if($upinfo['error'] === false)
        die("图片上传失败：".$upinfo['info']);
    else
        $pic = $upinfo['info'];
    imageUpdateSize('./uploads/'.$pic, 50, 50);
    $sql = "INSERT INTO goods VALUES (NULL, '{$name}', '{$typeid}', '{$price}', '{$total}', '{$pic}', '{$note}', '{$addtime}')";
    mysql_query($sql, $link);

    if(mysql_insert_id($link)>0)
        echo "发布成功";
    else
        echo "发布失败".mysql_error();
    echo "<br><a href="index.php">查看商品信息</a>";
    return;
}
switch($_GET['action']){
    case "add":
        Add();
        break;
    case "del":
        Del();
        break;
    case "update":
        Update();
        break;
    }



 ?>
