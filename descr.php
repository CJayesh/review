<!DOCTYPE html>
<html>
<head>
	<title>Description</title>
</head>
<body>
<?php
	include 'header.php';
	include 'connect.php';
	$pid=$_REQUEST['pid'];
	$query="SELECT * FROM p_info WHERE pid='$pid'";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_array($result);
?>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class="col-md-3 col-s-12">
				<?php
					$str="<image style='margin-right:10px' src='images/".$row['image']."'/>";
					echo $str;
				?>
			</div>
			<div class="col-md-9 col-s-12" style="font:sans-serif;">
				<p>About this Product:</p>
				<?php
					$info="<font size=5>";
				    $info.=$row['brand'].":".$row['type']."<br>".$row['name']."<br>";
					$info.="PRICE:₹".$row['cost'];
					$info.="<br>DESCRIPTION:".$row['descr']."<br>";
					$info.="</font>";
					echo $info;
				?>
			</div>

			<div class="row" style="margin-top:10px ">	
			<div class="col-md-12 col-s-12">
				<div class="panel panel-info" style="margin-top:20px "> 
				<div class="panel-heading"><h3>Write a Review</h3></div> 
				<div class="panel-body">
					<form action='review.php' method='get' role='form'>
						<?php
						echo "<input class='form-control' type='hidden' name='pid' value='".$row['pid']."'/>";
						?>
						<textarea class="form-control" name='review' rows=5 columns=5 maxlength="100"></textarea>
						<input class="btn btn-success form-control" type='submit' value='review this product'/>
					</form>
				</div>
				</div>
			</div>
			</div>
	
		</div>

		<div class="col-md-5 col-s-12">
			<div class="panel panel-success">
		      <div class="panel-heading">
		      	<h3><span class="glyphicon glyphicon-pencil"></span>REVIEWS:</h3>
		      </div>
		      <div class="panel-body">
		      	<?php
					$sql="SELECT * from p_review where pid='$pid';";
					$res=mysqli_query($conn,$sql);
					
					//$count=mysqli_num_rows($res);
					while($string=mysqli_fetch_assoc($res)){
						$uid=$string['uid'];
						//$q=mysqli_query($conn,"SELECT name from user_info where uid='$uid';");
						//echo implode(mysqli_fetch_array($q)).split(pattern, string);
						$name=@implode(mysqli_fetch_assoc(mysqli_query($conn,"SELECT name from user_info where uid='$uid';")));
						echo "<span class='glyphicon glyphicon-flash'></span><font size='3'>".$name.":".$string['review']."</font>";
						echo "<br>";
					}
				?>
		      </div>
		    </div>
		</div>
	</div>
</div>
</body>
</html>