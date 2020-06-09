<?php

	header("Content-Type: text/html; charset=utf8");
	
	if(!isset($_POST["submit"])){
		exit("錯誤執行");
	}//檢測是否有submit操作 
	
	include('database/connect.php');//連結資料庫
	
	$name = $_POST['registUserName'];//post獲得使用者帳號
	
	$password = $_POST['registPassword'];//post獲得使用者密碼單值
	
	
	
	if ($name && $password){//如果使用者名稱和密碼都不為空
		
		$sha256_passowrd =  hash('sha256', $password);
		
		$sql = "INSERT INTO member(username,password)VALUES(?,?)";
		$stmt = $conn->prepare($sql);
		$stmt -> bind_param("ss", $name,$sha256_passowrd);
		$stmt -> execute();

		echo "註冊完成";
		echo "
				<script>
					setTimeout(function(){window.location.href='login_view.html';},1000);
				</script>
				";
				
		$stmt -> close();
	}
	
	mysqli_close($conn);
?>