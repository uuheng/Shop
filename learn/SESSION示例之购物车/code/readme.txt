=======================================================
   php基础示例-- PHP_MySQL商品信息管理--购物车的练习（Session会话技术）
=======================================================
实现目标： 在商品信息的在线增、删、改、查(图片信息的操作)基础上实现商品的购买，
	对购物车的管理做一个应用练习。

上次技术： 	文件的上传
			图片的缩放
			数据库的基本操作
	   
本次技术：  SESSION会话的应用
			$_SESSION超全局数组，可以维持当前用户的状态，信息内容是保存在服务器端的。
			
			简单操作：向session中放置：$_SESSION["name"]="zhangsan";
						取值： echo $_SESSION["name"];
						
		注意：在要使用session的页面开头处使用session_start（）函数来启动会话

实现步骤：
	1. 设计并创建数据库和表格
		mysql> desc goods;
		+---------+----------------------+------+-----+---------+----------------+
		| Field   | Type                 | Null | Key | Default | Extra          |
		+---------+----------------------+------+-----+---------+----------------+
		| id      | int(10) unsigned     | NO   | PRI | NULL    | auto_increment |
		| name    | varchar(64)          | NO   |     | NULL    |                |
		| typeid  | int(10) unsigned     | NO   |     | NULL    |                |
		| price   | double(6,2) unsigned | NO   |     | NULL    |                |
		| total   | int(10) unsigned     | NO   |     | NULL    |                |
		| pic     | varchar(32)          | NO   |     | NULL    |                |
		| note    | text                 | YES  |     | NULL    |                |
		| addtime | int(10) unsigned     | NO   |     | NULL    |                |
		+---------+----------------------+------+-----+---------+----------------+
		8 rows in set (0.02 sec)

		mysql> show create table goods \G;
		*************************** 1. row ***************************
			   Table: goods
		Create Table: 
			CREATE TABLE `goods` (
			  `id` int(10) unsigned NOT NULL auto_increment,
			  `name` varchar(64) NOT NULL,
			  `typeid` int(10) unsigned NOT NULL,
			  `price` double(6,2) unsigned NOT NULL,
			  `total` int(10) unsigned NOT NULL,
			  `pic` varchar(32) NOT NULL,
			  `note` text,
			  `addtime` int(10) unsigned NOT NULL,
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8
		1 row in set (0.00 sec)

	2. 创建项目的目录具体文件
	  ------------
		|--add.php 商品添加页面
		|
		|--edit.php 商品信息编辑表单页
		|
		|--index.php 商品信息浏览页
		|
		|--action.php 执行商品信息添加和修改及删除等操作处理
		|
		|--dbconfig.php 公共配置文件
		|
		|--menu.php 导航栏
		|
		|--uploads/ 上传图片的存放目录
		|
		|--functions.php 公共函数库文件：图片信息的上传、等比缩放等处理函数
		|
		|--addCart.php 添加购物车信息的操作（向session放入要购买的信息）
		|
		|--myCart.php 实现了购物车信息的浏览操作，并且实现商品信息的统计（小计和总计）
		|
		|--clearCart.php 实现了购物车信息的单个商品删除或清空购物车操作
		|
		|--updateCart.php 修改购物车中商品的数量，防止过小约束
			

二、购物车的具体实现：
-----------------------------------------------
  1. 准备工作：
		1.1 在menu.php中添加两个超级链接：【我的购物车】【清空购物车】。
		1.2 在index.php 界面中添加放入购物车的链接。
			
			
			
			

讲师：		张 涛
Email/QQ：	zhangtao@lampbrother.net

