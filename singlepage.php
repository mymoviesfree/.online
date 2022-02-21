<?php include 'header.php';
$id=$_GET['id'];?>
<?php 
	include 'config.php';
	$q1="SELECT * FROM `comment`";
$d1=mysqli_query($dbcon,$q1) or die(mysqli_error($dbcon));
$reg_count=mysqli_num_rows($d1);
##########Add Top Banner Image Insert Query################
	extract($_POST);
	if(isset($_POST['add_logo']))
	{
		   		$query="INSERT INTO `comment` (`name`,`comment`,`id`) VALUES ('".$name."','".$comment."','".$id."')";
			mysqli_query($dbcon,$query);
			$empty="<div class='alert alert-success' role='alert'>Commented Successfully</div>";
			header("location:singlepage.php?id=$id");
   }	
	
	
##########Add banner bottom-section Image Insert Query end################
?>
<section class="container py-5">
	<div class="row">
				<?php
					include 'config.php';
					$q1="SELECT * FROM `movie` where `id`='".$id."'";
					$d1=mysqli_query($dbcon, $q1);
					$counter=0;
					$res3=mysqli_fetch_array($d1);
						?>
		<div class="col-sm-3">
			<div class="card mb-3">
				<a href="Single/<?php echo $res3['id'];?>"><img src="admin/<?php echo $res3['image'];?>" class="card-img-top" alt="allbum-name"></a>
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
					<!-- <li class="list-group-item bg-dark"><a class="text-decoration-none font-weight-bold text-white" target="_blank" href="Single/<?php echo $res3['id'];?>">Download now</a></li> -->
				</ul>
			</div>
		</div>
		<div class="col-md-6">
			<div class="title">
				<h4 class="text-uppercase font-weight-bold"><?php echo $res3['des'];?></h4>
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><h4>IMDB: <?php echo $res3['rating'];?></h4></li>
					<li class="list-group-item"><h4>Director: <?php echo $res3['director'];?></h4></li>
					<li class="list-group-item"><h4>Actors: <?php echo $res3['actor'];?></h4></li>
					<li class="list-group-item"><h4>Release Date: <?php echo $res3['date'];?></h4></li>
				</ul>
			</div>
		</div>	
	</div>
	<div class="row">
		<div class="col-md-12">
			<a class="btn text-center btn-danger text-white btn-block mb-3 text-uppercase" target="_blank" href="<?php echo $res3['ourl'];?>">See Online</a>
		</div>
		<div class="col-md-12">
			<a class="btn text-center btn-success text-white btn-block text-uppercase" target="_blank" href="<?php echo $res3['url'];?>">Download now</a>
		</div>
	</div>
	<div class="row pt-5">
		<div class="get-in-touch">
			<h1 class="title">Leave A Comment</h1>
			<form class="contact-form row" method="post">
				<div class="form-field w-50">
					<input id="name" class="input-text js-input" type="text" name="name" required>
					<label class="label" for="name">Name</label>
				</div>
				<div class="form-field w-100">
					<input id="message" class="input-text js-input" name="comment" type="text" required>
					<label class="label" for="message">Comment</label>
				</div>
				<div class="form-field w-100 text-center mx-auto">
					<input class="submit-btn" type="submit" name="add_logo" value="SUBMIT COMMENT">
				</div>
			</form>
			<?php if(isset($empty)){ echo $empty;} ?>
		</div>
	</div>
	<div class="container pt-5">
		<h2 class="text-center text-uppercase">Comments</h2>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-2">
						<h5 class="text-center text-primary">Maniruzzaman Akash</h5>
						<p class="text-secondary text-center">15 Minutes Ago</p>
					</div>
					<div class="col-md-10">
						<div class="clearfix"></div>
						<p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						<p>
							<a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
							<a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include 'footer.php'; ?>