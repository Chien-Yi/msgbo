<?php session_start(); ?>


<?php

	header("Content-Type: text/html; charset=utf8");
	
	if(!isset($_POST["submit"]) || $_SESSION['username'] == null){
		exit("錯誤執行");
	}//檢測是否有submit操作 
	
	include('database/connect.php');//連結資料庫
	
	$messageId = $_POST['messageId'];//post獲得Id
	
	$message = $_POST['messageContent'];//post獲得內容
	
	$name = $_SESSION['username'];
	
	
	
	if (isset($messageId) && isset($message)){//如果使用者名稱和密碼都不為空
		
	
		
		$sql = "INSERT INTO messageDetails(messageId,detailsContent,detailsName,detailsTime)VALUES(?,?,?,NOW())";
		$stmt = $conn->prepare($sql);
		$stmt -> bind_param("iss", $messageId,$message,$name);
		$stmt -> execute();

		echo "回覆完成";
		echo "
				<script>
					setTimeout(function(){window.location.href='welcome.php';},1000);
				</script>
				";
				
		$stmt -> close();
	}
	
	mysqli_close($conn);
?>