<?php session_start(); ?>


<?php

	header("Content-Type: text/html; charset=utf8");
	
	if(!isset($_POST["submit"]) || $_SESSION['username'] == null){
		exit("錯誤執行");
	}//檢測是否有submit操作 
	
	include('database/connect.php');//連結資料庫
	
	$subject = $_POST['messageSubject'];//post獲得主旨
	
	$message = $_POST['messageContent'];//post獲得內容
	
	$name = $_SESSION['username'];
	
	
	
	if (isset($subject) && isset($message)){//如果使用者名稱和密碼都不為空
		
	
		
		$sql = "INSERT INTO message(messageSubject,messageContent,messageName,messageTime)VALUES(?,?,?,NOW())";
		$stmt = $conn->prepare($sql);
		$stmt -> bind_param("sss", $subject,$message,$name);
		$stmt -> execute();

		echo "新增完成";
		echo "
				<script>
					setTimeout(function(){window.location.href='welcome.php';},1000);
				</script>
				";
				
		$stmt -> close();
	}
	
	mysqli_close($conn);
?>