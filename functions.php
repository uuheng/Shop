<?php
require('dbconfig.php');

function uploadFile(){
	// var_dump($_FILES);
	$file = $_FILES['pic'];
	$path = './uploads/';
	$filetypes = array("image/jpeg", "image/jpg", "image/png", "image/gif");
	if($file['error']>0)
		die("上传失败".$file['error']);
	if($file['size']>MAX_FILE_SIZE)
		die("超出大小限制");
	// var_dump($file);
	if(!in_array($file['type'], $filetypes))
		die("类型非法");
	$fileinfo = pathinfo($file['name']);
	do{
		$newfile = date('YmdHis').rand(1000, 9999).".".$fileinfo['extension'];
	}while(file_exists($newfile));
	if(is_uploaded_file($file['tmp_name'])){
		if(move_uploaded_file($file['tmp_name'], $path.$newfile)){
			echo "文件上传成功";
			// echo "<a href='index.php'>返回首页</a>";
		}
		else
			die("文件上传失败。。。。");
	}
	else
		die("不是上传文件");
	return $newfile;
}

function Add(){
    $link = mysqli_connect(HOST, USER, PASS, DBNAME) or die("数据库连接失败");
    // echo "hanshuhsnshu";
    $name = $_POST['name'];
    $typeid = $_POST['typeid'];
    $price = $_POST['price'];
    $total = $_POST['total'];
    $note = $_POST['note'];
    $addtime = time();
    //此处应该验证if.....

    $pic = uploadFile();
    // imageUpdateSize('./uploads/'.$pic, 50, 50);
    $sql = "INSERT INTO goods VALUES (NULL, '{$name}', '{$typeid}', '{$price}', '{$total}', '{$pic}', '{$note}', '{$addtime}')";
    mysqli_query($link, $sql);

    if(mysqli_insert_id($link)>0)
        echo "发布成功";
    else
        echo "发布失败";
    echo "<br><a href=\"index.php\">查看商品信息</a>";
    mysqli_close($link);
    return;
}

function Del(){
	$sql = "delete from goods where id='{$_GET['id']}'";
	echo $sql;
	$link = mysqli_connect(HOST, USER, PASS, DBNAME) or die("数据库连接失败");
	mysqli_query($link, $sql);
	if(mysqli_affected_rows($link)>0){
		unlink("./uploads/".$_GET['picname']);
	}
	else {
		echo "删除失败";
	}
	header("Loaction: index.php");
	return;
}

?>
