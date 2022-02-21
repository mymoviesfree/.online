<?php 
	include 'config.php';
##########Add Top Banner Image Insert Query################
	extract($_POST);
	if(isset($_POST['s']))
	{
		   		header("location:Search/$se");
   }	
	
	
##########Add banner bottom-section Image Insert Query end################
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="description" content=" ">
	<meta name="keywords" content=" ">
	<meta name="author" content=" ">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<base href="http://localhost/mymovies/">
	<title>My Movies | Home</title>
	<link rel="shortcut icon" href="images/logo.png" type="image/png">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	  <!-- script -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
	<!---start-header---->
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" width="80"></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
					<li class="nav-item active">
						<a class="nav-link" href="Bollywood">Bollywood Movies <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Hollywood">Hollywood Moview</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Dual">Dual Audio Movies</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Music">Music Video</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Web">Web Series</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Request">Make a Movie Request</a>
					</li>
				</ul>
			</div>
			<form class="form-inline float-right my-2 my-lg-0" method="post">
				<input class="form-control mr-sm-2" type="search" name="se" placeholder="Search Here...">
				<button class="btn btn-dark my-2 my-sm-0" name="s" type="submit">Search</button>
			</form>
		</nav>
	</div>