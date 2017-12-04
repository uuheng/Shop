=======================================================
   php基础示例-- PHP_MySQL商品信息管理
=======================================================
实现目标： 商品信息的在线增、删、改、查(图片信息的操作)

技术： 文件的上传
	   图片的缩放
	   数据库的基本操作

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
			


讲师：		张 涛
Email/QQ：	zhangtao@lampbrother.net

