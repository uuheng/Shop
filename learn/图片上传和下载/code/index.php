<html>
	<head>
		<title>图片上传和下载示例</title>
	</head>
	<body>
		<h2>图片上传和下载示例</h2>
		
		<!-- 文件上传的form表单 -->
		<form action="doupload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
			上传图片：<input type="file" name="pic"/>
			<input type="submit" value="上传"/>
		</form>
		
		
		<table width="500" border="0">
			<tr align="left" bgcolor="#cccccc">
				<th>序号</th><th>图片</th><th>添加时间</th><th>操作</th>
			</tr>
			<?php
				//1.打开目录uploads。
				$dir = opendir("./uploads");
				//2/遍历目录，输出里面的图片信息
				$i=0;
				while($f = readdir($dir)){
					if($f!="." && $f!=".."){
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td><img src='./uploads/{$f}' width='80' height='50' /></td>";
						echo "<td>".date("Y-m-d",filectime("./uploads/".$f))."</td>";
						echo "<td><a href='./uploads/{$f}'>查看</a>，
								<a href='download.php?name={$f}'>下载</a></td>";
						echo "</tr>";
					}
				}
				//3、 关闭目录
				closedir($dir);
			?> 			<tr bgcolor="#cccccc">
				<td colspan="4">&nbsp;</td>
			</tr>
		</table>
	</body>
</html>