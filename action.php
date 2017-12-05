<?php
echo "asdfasdf";
require("dbconfig.php");
// require("functions.php");
$link = mysqli_connect(HOST, USER, PASS, DBNAME) or die("数据库连接失败");
// mysqli_select_db(DBNAME);
// var_dump($link);
// echo DBNAME;
function Add(){
    echo "hanshuhsnshu";
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
    var_dump($pic);
    imageUpdateSize('./uploads/'.$pic, 50, 50);
    $sql = "INSERT INTO goods VALUES (NULL, '{$name}', '{$typeid}', '{$price}', '{$total}', '{$pic}', '{$note}', '{$addtime}')";
    mysqli_query($link, $sql);

    if(mysqli_insert_id($link)>0)
        echo "发布成功";
    else
        echo "发布失败";
    echo "<br><a href=\"index.php\">查看商品信息</a>";
    return;
}
switch($_GET['action']){
    case "add":
        Add();
        // echo "123123";
        break;
    case "del":
        Del();
        break;
    case "update":
        Update();
        break;
    }



 ?>
