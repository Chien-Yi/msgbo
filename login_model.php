<?php
	
	session_start(); 

	header("Content-Type: text/html; charset=utf8");
	
	if(!isset($_POST["submit"])){
		exit("錯誤執行");
	}//檢測是否有submit操作 
	
	include('database/connect.php');//連結資料庫
	
	$name = $_POST['inputUserName'];//post獲得使用者帳號
	
	$password = $_POST['inputPassword'];//post獲得使用者密碼單值
	
	if ($name && $password){//如果使用者名稱和密碼都不為空
	
		$sha256_passowrd =  hash('sha256', $password);
	
		$sql = "select * from member where username = '$name' and password='$sha256_passowrd'";//檢測資料庫是否有對應的username和password的sql
		$result = mysqli_query($conn,$sql);//執行sql
		$rows = mysqli_num_rows($result);//返回一個數值
		
		if($rows){//0 false 1 true
			$_SESSION['username'] = $name;
			header("refresh:0;url=welcome.php");//如果成功跳轉至welcome.html頁面
			exit;
		}else{
			echo "使用者名稱或密碼錯誤";
			echo "
				<script>
					setTimeout(function(){window.location.href='login_view.html';},1000);
				</script>
				";//如果錯誤使用js 1秒後跳轉到登入頁面重試;
		}
	}
	else{
		echo "帳號密碼錯誤";
	}
	
	mysqli_close($conn);
?>