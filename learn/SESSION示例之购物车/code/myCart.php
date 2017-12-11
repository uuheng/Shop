<?php 
	session_start();//启动会话

?>
<html>
	<head>
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<?php  include("menu.php"); //导入导航栏  ?>
			<h3>浏览我的购物车<h3>
			<table border="1" width="600">
				<tr>
					<th>商品id号</th><th>商品名称</th><th>商品图片</th>
					<th>单价</th><th>数量</th><th>小计</th><th>操作</th>
				</tr>
				<?php
					$sum = 0;//定义总金额的变量
				 if(isset($_SESSION["shoplist"]))
					foreach($_SESSION["shoplist"] as $v){
						echo "<tr>";
						echo "<td>{$v['id']}</td>";
						echo "<td>{$v['name']}</td>";
						echo "<td><img src='./uploads/s_{$v['pic']}'/></td>";
						echo "<td>{$v['price']}</td>";
						echo "<td align='center'>
								<button onclick='window.location.href=\"updateCart.php?id={$v['id']}&num=-1\"'>-</button>
								{$v['num']}
								<button onclick='window.location.href=\"updateCart.php?id={$v['id']}&num=1\"'>+</button>
								</td>";
						echo "<td>".($v["price"]*$v['num'])."</td>";
						echo "<td><a href='clearCart.php?id={$v['id']}'>删除</a></td>";
						echo "</tr>";
						$sum+=$v["price"]*$v['num']; //累计金额
					}
				?>
				<tr>
					<th>总计金额：</th>
					<th colspan="5" align="right"><?php echo $sum; ?></th>
					<td>&nbsp;</td>
				</tr>
			</table>
		</center>
	</body>
</html>