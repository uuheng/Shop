<html>
<head>
	<title>图片上传和下载</title>
	<meta charset="utf-8"/>
</head>
<body>
	<h3>图片上传下载</h3>
	<form action="doupload.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="999999"/>
		<p>上传图片</p>
		<input type="file" name="pic"/>
		<input type="submit" value="上传"/>
	</form>

	<table width="500" boder="2">
		<tr align="left" bgcolor="#cccccc">
			<th>序号</th><th>图片</th><th>添加时间</th><th>操作</th>
		</tr>
		<?php
		date_default_timezone_set('PRC');
		$dir = opendir('./uploads/');
		$i = 0;
		while($f=readdir($dir)){
			if($f!='.' && $f!='..'){
				$i++;
				echo '<tr>';
				echo "<td>{$i}</td>";
				echo "<td><img src='./uploads/{$f}' width='80' height='50' /></td>";
				echo "<td>".date("Y-m-d", filectime("./uploads/".$f))."</td>";
				echo "<td><a href='uploads/{$f}'>查看</a>&nbsp;<a href='download.php?name={$f}'>下载</a></td>";
				echo "</tr>";
			}
		}
		closedir($dir);
		?>
		<tr bgcolor="#cccccc">
			<td colspan="4">&nbsp;</td>
		</tr>
	</table>
</body>
</html>