=======================================================
   php基础示例-- 图片的上传和下载
=======================================================
实现目标： 通过图片上传来了解php中文件上传的流程。

1. 创建图片上传的存放目录uploads

2. 创建index.php文件，浏览上传后的图片，并提供上传表单，
	
	注意：上传表单中发送方式必须是post，类型enctype：multipart/form-data

3. doupload.php文件，执行图片上传
	
	接收文件上传使用的是$_FILES
	 每个上传的文件都有5个上传信息组成的数组
		1. name:上传文件名
		2. type:文件类型
		3. tmp_name: 上传成功后的临时文件名
		4. error: 和该文件上传相关的错误代码
		5. size:上传文件的大小
	 
	 array(1) {
	  ["pic"]=> //上传文件的表单项名
	  array(5) {
		["name"]=>	//上传文件名
		string(6) "15.jpg"
		["type"]=>
		string(10) "image/jpeg"
		["tmp_name"]=>
		string(25) "C:\WINDOWS\Temp\phpB4.tmp"
		["error"]=>
		int(0)
		["size"]=>
		int(7266)
	  }
	}
		 

4. download.php下载文件（图片）


