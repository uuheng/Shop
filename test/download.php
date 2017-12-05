<?php
$file = "./uploads/".$_GET['name'];
$info = getimagesize($file);
// var_dump($info);
header("Content-Type:".$info['mime']);
header("Content-Disposition:attachment;filename=".$_GET['name']);
header("Content-Length:".filesize($file));
readfile($file);
?>