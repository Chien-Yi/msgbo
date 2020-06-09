<?php session_start(); ?>

<?php

	if($_SESSION['username'] == null){
		echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login_view.html>';
        
   
	}

?>


<head>
	<title>留言版登入</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/signin.css">
</head>

<body >

	<div class="container">
		 <div class="row">
			<div class="col">
				<h1>留言板練習</h1>
			</div>
			<div class="col-9">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newModal"> 新 增 留 言 </button>
				<a href="logout.php" class="btn btn-danger">登 出</a>
			</div>
		 </div>
		 <hr>
		 <?php include('messageList.php'); ?>
		 
	
	
	<!-- Modal -->
	<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">回覆留言</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form class="form-signin" id="replymessage" action="replyMessage.php" method="post">
			  <div class="modal-body">
				  <div class="form-group">
					<label for="messageContent">內容</label>
					<input type="hidden" class="form-control" name="messageId">
					<textarea rows="5" cols="50" name="messageContent" form="replymessage">請輸入內容...</textarea>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">離 開</button>
				<input type="submit" name="submit" class="btn btn-primary" value="回 覆">
			  </div>
		  </form>
		</div>
	  </div>
	</div>
	
	<!-- Modal -->
	<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">新增留言</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <form class="form-signin" id="newmessage" action="newMessage.php" method="post">
			  <div class="modal-body">
					<div class="form-group">
					<label for="messageSubject">主旨</label>
					<input type="text" class="form-control" name="messageSubject" >
				  </div>
				  <div class="form-group">
					<label for="messageContent">內容</label>
					<textarea rows="5" cols="50" name="messageContent" form="newmessage">請輸入內容...</textarea>
				  </div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">離 開</button>
				<input type="submit" name="submit" class="btn btn-primary" value="新 增">
			  </div>
		  </form>
		</div>
	  </div>
	</div>
	
	
	
	
	<script>
		function getMessageId(id) {
			replymessage.messageId.value = id;
		}
	
	</script>

	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

