<?php

	$server = "localhost";//主機
	
	$db_username = "root";//資料庫使用者名稱

	$db_password = "root";//資料庫密碼
	
	$db_name = "test";//資料庫名稱
	

	$conn = mysqli_connect($server,$db_username,$db_password,$db_name);
	
	if(!$conn){
		die("can't connect".mysqli_error());//如果連結失敗輸出錯誤
	}
	
?>