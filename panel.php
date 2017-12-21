<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container row">
	<div class="col-md-6" style="text-align: left">
		<div class="panel panel-default"> 
		<div class="panel-heading"><h1>Admin Panel</h1></div>
		<a href="logout.php">LOGOUT</a>
		<div class="panel-body">
			<pre>
			<form action="insert.php" method="POST" enctype="multipart/form-data">
				Product Name:<input type="text" name="name"/><br>
				Product Type:<input type="text" name="type"/><br>
				Brand       :<input type="text" name="brand"/><br>
				Description :<textarea rows='5' columns='5' type="text" name="descr" id="descr"></textarea><br>
				Cost        :<input type="number" name="cost"/><br>
				Image       :<input type="file" name="image"/><br>
				<input type="submit" value="Insert">
			</form>
			</pre>
		</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default"> 
		<div class="panel-heading"><h1>Website Feedbacks</h1></div>
		<div class="panel-body">
			<?php
					include 'connect.php';
					$sql="SELECT * from feedback";
					$res=mysqli_query($conn,$sql);
					
					//$count=mysqli_num_rows($res);
					while($string=mysqli_fetch_assoc($res)){
						echo "<span class='glyphicon glyphicon-file'></span><font size='3'>"." ".$string['email'].":".$string['feed']."</font>";
						echo "<br>";
					}
			?>
		</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="panel panel-default"> 
		<div class="panel-heading"><h1>New Subscriptions</h1></div>
		<div class="panel-body">
			<?php
					include 'connect.php';
					$sql="SELECT * from subscribe";
					$res=mysqli_query($conn,$sql);
					
					//$count=mysqli_num_rows($res);
					while($string=mysqli_fetch_assoc($res)){
						echo "<span class='	glyphicon glyphicon-hand-up'></span><font size='3'>"." ".$string['email']."</font>";
						echo "<br>";
					}
			?>
		</div>
		</div>
	</div>
</div>
</body>

</html>