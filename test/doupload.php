<?php
define("MAX_SIZE", "999999");
date_default_timezone_set("PRC");
echo "<pre>";
// var_dump($_FILES);
echo "</pre>";

$upfile = $_FILES['pic'];
$typelist = array("image/jpeg","image/jpg","image/png","image/gif");
$path = "./uploads/";
if($upfile['error']>0)
	die("上传错误：".$upfile['error']);
if($upflie['size']>MAX_SIZE)
	die("超出大小限制");
if(!in_array($upfile['type'], $typelist))
	die("文件类型非法");
$fileinfo = pathinfo($upfile['name']);
do{
	$newfile = date("YmdHis").rand(1000, 9999).".".$fileinfo['extension'];
}while(file_exists($path.$newfile));
if(is_uploaded_file($upfile['tmp_name'])){
	if(move_uploaded_file($upfile['tmp_name'], $path.$newfile)){
		echo "文件上传成功";
		echo "<a href='index.php'>浏览</a>";
	}
	else
		echo "文件上传失败";
}
else
	die("不是上传文件");

?>