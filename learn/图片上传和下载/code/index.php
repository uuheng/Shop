<html>
	<head>
		<title>ͼƬ�ϴ�������ʾ��</title>
	</head>
	<body>
		<h2>ͼƬ�ϴ�������ʾ��</h2>
		
		<!-- �ļ��ϴ���form�� -->
		<form action="doupload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
			�ϴ�ͼƬ��<input type="file" name="pic"/>
			<input type="submit" value="�ϴ�"/>
		</form>
		
		
		<table width="500" border="0">
			<tr align="left" bgcolor="#cccccc">
				<th>���</th><th>ͼƬ</th><th>���ʱ��</th><th>����</th>
			</tr>
			<?php
				//1.��Ŀ¼uploads��
				$dir = opendir("./uploads");
				//2/����Ŀ¼����������ͼƬ��Ϣ
				$i=0;
				while($f = readdir($dir)){
					if($f!="." && $f!=".."){
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td><img src='./uploads/{$f}' width='80' height='50' /></td>";
						echo "<td>".date("Y-m-d",filectime("./uploads/".$f))."</td>";
						echo "<td><a href='./uploads/{$f}'>�鿴</a>��
								<a href='download.php?name={$f}'>����</a></td>";
						echo "</tr>";
					}
				}
				//3�� �ر�Ŀ¼
				closedir($dir);
			?> 			<tr bgcolor="#cccccc">
				<td colspan="4">&nbsp;</td>
			</tr>
		</table>
	</body>
</html>