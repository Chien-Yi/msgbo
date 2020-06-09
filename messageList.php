
<?php
	
	include('database/connect.php');//連結資料庫
	
	$name = $_SESSION['username'];
	
	
	
	if (isset($name)){
		
		$sql = "select * from message ORDER BY messageId desc";
		
		$stmt = $conn->prepare($sql);
		//$stmt -> bind_param("s",$name);
		$stmt -> execute();
		
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) {
		?>
		<div class="row">
			<div class="col"><? echo $row['messageTime']; ?></div>
			<div class="col"><? echo $row['messageName']; ?></div>
			<div class="col-8">
				<h4><? echo $row['messageSubject']; ?></h4>
			</div>
		 </div>
		 <div class="row">
			<div class="col"></div>
			<div class="col-8">
					<pre><? echo $row['messageContent']; ?></pre>
			</div>
		</div>
		
		<?php 
			$sql_d = "select * from messageDetails where messageId = ? ORDER BY detailsId ";
			$stmt_d = $conn->prepare($sql_d);
			$stmt_d -> bind_param("i",$row['messageId']);
			$stmt_d -> execute();
			
			$result_d = $stmt_d->get_result();
			while ($row_d = $result_d->fetch_assoc()) {
		?>
			<div class="row">
				<div class="col"><? echo $row_d['detailsTime']; ?></div>
				<div class="col"><? echo $row_d['detailsName']; ?></div>
				<div class="col-8">
					<pre> <? echo $row_d['detailsContent']; ?></pre>
				</div>
			</div>
			<?}
			$stmt_d -> close();
			?>
			
		
		 <div class="row">
			<div class="col-1">
				<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#replyModal" onclick="getMessageId('<?echo $row['messageId'];?>');"> 回 覆 </button>
			</div>
			<? if( $name == $row['messageName']){?>
			
			<div class="col-1">
				<button type="button" class="btn btn-danger btn-sm" > 刪 除 </button>
			</div>
			<? } ?>

		 </div>
		 <hr>
		 <!--
			<div class="col-1">
				<button type="button" class="btn btn-success btn-sm" > 修 改 </button>
			</div>
		-->
		<?php
		
		}
				
		$stmt -> close();
	}
	
	mysqli_close($conn);
?>