<?php
//ִ��ͼƬ����

//1.��ȡҪ���ص�ͼƬ��������·����
	$file = "./uploads/".$_GET["name"];
//2.������Ӧ����
	$info = getimagesize($file);
	header("Content-Type:".$info["mime"]);
//3. ִ�����ص��ļ�����
	header("Content-Disposition:attachment;filename=".$_GET["name"]);

//4. ָ���ļ��Ĵ�С
	header("Content-Length:".filesize($file));
	
//5. ��Ӧ����
	readfile($file);
