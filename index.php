<?php include 'header.php';
	if(isset($_GET['cat']))
	{
		$cat=$_GET['cat'];
	}
?>
	<!---start-content---->
	<div class="container-fluid pt-3">
		<div class="row">
			<?php 
			if(isset($cat)){
			if($cat!=''){?>
			<?php
			include 'config.php';
			$q1="SELECT * FROM `movie` where `category`='".$cat."'";
			$d1=mysqli_query($dbcon, $q1);
			$counter=0;
			$reg_count=mysqli_num_rows($d1);
			if($reg_count!=0)
			{
			while ($res3=mysqli_fetch_array($d1)) {
				?>
			<div class="col-sm-3">
				<div class="card mb-3">
					<a href="Single/<?php echo $res3['id'];?>"><img src="admin/<?php echo $res3['image'];?>" class="card-img-top" style="height:480px;" alt="allbum-name"></a>
					<ul class="list-group list-group-flush text-center">
						<li class="list-group-item font-weight-bold text-uppercase"><?php echo $res3['name'];?></li>
						<li class="list-group-item bg-dark text-white"><?php echo $res3['category'];?></li>
						<li class="list-group-item">
							<ul class="text-center">
								<li class="d-inline"><a href="#"><img src="images/star.png" style="width:15px;" title="image-name" /></a></li>
								<li class="d-inline" style="font-family: 'gandhi_sansregular';color: #888;"><?php echo $res3['rating'];?></li>
								<li class="d-inline" style="font-family: 'gandhi_sansregular';color: #888;padding:0px 5px;"><?php echo $res3['date'];?></li>
							</ul>
						</li>
						<li class="list-group-item bg-dark"><a class="text-decoration-none font-weight-bold text-white" target="_blank" href="Single/<?php echo $res3['id'];?>">Download now</a></li>
					</ul>
				</div>
			</div>
				<?php }
				}
				else
				header("location:404.php");
				}}
				else {?>
				<?php
				include 'config.php';
				$q1="SELECT * FROM `movie`";
				$d1=mysqli_query($dbcon, $q1);
				$counter=0;
				while ($res3=mysqli_fetch_array($d1)) {
					?>
			<div class="col-sm-3">
				<div class="card mb-2">
					<a href="Single/<?php echo $res3['id'];?>"><img src="admin/<?php echo $res3['image'];?>" class="card-img-top" style="height:480px;" alt="allbum-name"></a>
					<ul class="list-group list-group-flush text-center">
						<li class="list-group-item font-weight-bold text-uppercase"><?php echo $res3['name'];?></li>
						<li class="list-group-item bg-dark text-white"><?php echo $res3['category'];?></li>
						<li class="list-group-item">
							<ul class="text-center">
								<li class="d-inline"><a href="#"><img src="images/star.png" style="width:15px;" title="image-name" /></a></li>
								<li class="d-inline" style="font-family: 'gandhi_sansregular';color: #888;"><?php echo $res3['rating'];?></li>
								<li class="d-inline" style="font-family: 'gandhi_sansregular';color: #888;padding:0px 5px;"><?php echo $res3['date'];?></li>
							</ul>
						</li>
						<li class="list-group-item bg-dark"><a class="text-decoration-none font-weight-bold text-white" target="_blank" href="Single/<?php echo $res3['id'];?>">Download now</a></li>
					</ul>
				</div>
			</div>
				<?php } }?>
		</div>
		<!---start-pagenation----->
		<!-- <nav aria-label="Page navigation example">
			<ul class="pagination justify-content-end">
				<li class="page-item disabled">
				<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
				<a class="page-link" href="#">Next</a>
				</li>
			</ul>
		</nav> -->
		<!---End-pagenation----->
	</div>
	<!---End-content---->
<?php include 'footer.php'; ?>