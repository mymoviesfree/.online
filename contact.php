<?php include 'header.php';
	include 'config.php';
	$q1="SELECT * FROM `comment`";
$d1=mysqli_query($dbcon,$q1) or die(mysqli_error($dbcon));
$reg_count=mysqli_num_rows($d1);
##########Add Top Banner Image Insert Query################
	extract($_POST);
	if(isset($_POST['add_logo']))
	{
		   		$query="INSERT INTO `comment` (`name`,`comment`) VALUES ('".$name."','".$comment."')";
			mysqli_query($dbcon,$query);
			$empty="<div class='alert alert-success' role='alert'>Request Submitted Successfully</div>";
   }	
	
	
##########Add banner bottom-section Image Insert Query end################
?>

<section class="container py-5">
   	<div class="get-in-touch">
		<h1 class="title">Make A Request</h1>
		<form class="contact-form row" method="post">
			<div class="form-field w-50">
				<input id="name" class="input-text js-input" type="text" name="name" required>
				<label class="label" for="name">Name</label>
			</div>
			<div class="form-field w-100">
				<input id="message" class="input-text js-input" name="comment" type="text" required>
				<label class="label" for="message">Message</label>
			</div>
			<div class="form-field w-100 text-center mx-auto">
				<input class="submit-btn" type="submit" name="add_logo" value="REQUEST">
			</div>
		</form>
		<?php if(isset($empty)){ echo $empty;} ?>
   	</div>
</section>

<script>
	$( '.js-input' ).keyup(function() {
		if( $(this).val() ) {
			$(this).addClass('not-empty');
		} else {
			$(this).removeClass('not-empty');
		}
	});
</script>

<?php include 'footer.php'; ?>		

